<template>
    <div class="container">
        <div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Radiology Management</h3>
<div class="card-tools">
 <button class="btn btn-success" @click="newModal">Add New <i class="fas fa-user-plus"></i></button>
</div>
</div>

<div class="card-body table-responsive p-0">
 <table class="table table-hover text-nowrap">
<thead>
<tr>
<th>ID</th>
<th>Patient Name</th>
<th>Patient Email</th>
<th>Symptoms</th>
<th>Result</th>
<th>Modify</th>
</tr>
</thead>
<tbody>

<tr v-for="rad in radiologies" :key="rad.id">
<td>{{rad.unique_id}}</td>
<td>{{rad.patient_name}}</td>
<td>{{rad.patient_email}}</td>
<td>{{rad.symptoms}}</td>
<td>{{rad.result}}</td>
<td>
    <a @click="editModal(rad)">
        <i class="fa fa-edit"></i>
    </a>
    /
    <a @click="deleteRecord(rad.id)">
        <i class="fa fa-trash"></i>
    </a>
</td>
</tr>
</tbody>
</table>
</div>

</div>

</div>

<div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewLabel">Add New Patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit.prevent="assignResult">
        <div class="form-group">
        <input v-model="form.unique_id" type="text" name="unique_id" placeholder="unique id" class="form-control" :class="{'is-invalid': form.errors.has('unique_id')}">
        <has-error :form="form" field="unique_id"></has-error>
        </div>

        <div class="form-group">
        <input v-model="form.patient_name" type="text" name="patient_name" placeholder="patient name" class="form-control" :class="{'is-invalid': form.errors.has('patient_name')}">
        <has-error :form="form" field="patient_name"></has-error>
        </div>

        <div class="form-group">
        <input v-model="form.patient_email" type="email" name="password" placeholder="patient email" class="form-control" :class="{'is-invalid': form.errors.has('patient_email')}">
        <has-error :form="form" field="patient_email"></has-error>
        </div>

        <div class="form-group">
        <input v-model="form.symptoms" type="text" name="password" placeholder="symptoms" class="form-control" :class="{'is-invalid': form.errors.has('symptoms')}">
        <has-error :form="form" field="symptoms"></has-error>
        </div>

        <div class="form-group">
        <input v-model="form.result" type="text" name="result" placeholder="result" class="form-control" :class="{'is-invalid': form.errors.has('result')}">
        <has-error :form="form" field="result"></has-error>
        </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>

      </form>

      </div>
      
      
    </div>
  </div>
</div>

    </div>
</template>

<script>
import Axios from 'axios';

    export default {
        data() {
            return{
                radiologies : {},
                form: new Form({
                    unique_id: '',
                    patient_name: '',
                    patient_email: '',
                    symptoms: '',
                    result: ''
                })
            }
        },
        methods: {
            deleteRecord(id){
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete it!'

                }).then((result) => {
                    this.form.delete('app/radiology/'+id).then(()=>{
                         swal(
                        'Deleted!',
                        'Your Record has been Deleted.',
                        'success'
                    )
                    }).catch(()=>{
                        swal("Failed", "There was something wrong.", "Warning")
                    });  
                   
                })
            },
            editModal(rad){
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(rad);
            },

            newModal(rad){
                this.form.reset();
                $('#addNew').modal('show');
            },
            loadResult(){
                Axios.get("api/radiology").then(({ data }) => (this.radiologies = data.data));
            },
            assignResult(){
                this.form.post('api/radiology');
                $('#addNew').modal('hide')
                toast({
                    type: 'Success',
                    title: 'Radiology result updated Succesfully'
                })
            }

        },
        created() {
            this.loadResult();
        }
    }
</script>
