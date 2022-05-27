<template>
    <div class="container">
        <div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Nurse Management</h3>
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
<th>Recommendation</th>
<th>Modify</th>
</tr>
</thead>
<tbody>

<tr v-for="nurse in nurses" :key="nurse.id">
<td>{{nurse.unique_id}}</td>
<td>{{nurse.patient_name}}</td>
<td>{{nurse.patient_email}}</td>
<td>{{nurse.symptoms}}</td>
<td>{{nurse.recommendation}}</td>
<td>
    <a @click="editModal(nurse)">
        <i class="fa fa-edit"></i>
    </a>
    /
    <a @click="deleteRecord(nurse.id)">
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
        <form @submit.prevent="assignPatient">
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
        <input v-model="form.recommendation" type="text" name="recommendation" placeholder="recommendation" class="form-control" :class="{'is-invalid': form.errors.has('recommendation')}">
        <has-error :form="form" field="recommendation"></has-error>
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
                nurses : {},
                form: new Form({
                    unique_id: '',
                    patient_name: '',
                    patient_email: '',
                    symptoms: '',
                    recommendation: ''
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
                    this.form.delete('app/nursing/'+id).then(()=>{
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
            editModal(nurse){
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(nurse);
            },
            newModal(nurse){
                this.form.reset();
                $('#addNew').modal('show');
            },
            loadYourPatient(){
                // this.form.get('api/user');
                Axios.get("api/nursing").then(({ data }) => (this.nurses = data.data));
            },
            assignPatient(){
                this.form.post('api/nursing');
                $('#addNew').modal('hide')
                toast({
                    type: 'Success',
                    title: 'Patient refered Succesfully'
                })
                // Axios.post("api/user").then(({ data }) => (this.users = data));
            }

        },
        created() {
            this.loadYourPatient();
        }
    }
</script>
