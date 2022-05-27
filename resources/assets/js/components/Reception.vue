<template>
    <div class="container">
        <div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Patient Management</h3>
<div class="card-tools">
 <button class="btn btn-success" data-toggle="modal" data-target="#addNew">Add New <i class="fas fa-user-plus"></i></button>
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
<th>Modify</th>
</tr>
</thead>
<tbody>

<tr v-for="patient in patients" :key="patient.id">
<td>{{patient.unique_id}}</td>
<td>{{patient.patient_name}}</td>
<td>{{patient.patient_email}}</td>
<td>{{patient.symptoms}}</td>
<td>
    <a href="">
        <i class="fa fa-edit"></i>
    </a>
    /
    <a href="">
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
        <h5 class="modal-title" id="addNewLabel">Patient Check In Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit.prevent="createPatient">
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
                patients : {},
                form: new Form({
                    unique_id: '',
                    patient_name: '',
                    patient_email: '',
                    symptoms: ''
                })
            }
        },
        methods: {
            loadPatient(){
                // this.form.get('api/user');
                Axios.get("api/reception").then(({ data }) => (this.patients = data.data));
            },
            createPatient(){
                this.form.post('api/reception');
                // Axios.post("api/user").then(({ data }) => (this.users = data));
            }

        },
        created() {
            this.loadPatient();
        }
    }
</script>
