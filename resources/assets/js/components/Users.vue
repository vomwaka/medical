<template>
    <div class="container">
        <div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Users Management</h3>
<div class="card-tools">
 <button class="btn btn-success" data-toggle="modal" data-target="#addNew">Add New <i class="fas fa-user-plus"></i></button>
</div>
</div>

<div class="card-body table-responsive p-0">
 <table class="table table-hover text-nowrap">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Type</th>
<th>Modify</th>
</tr>
</thead>
<tbody>

<tr v-for="user in users" :key="user.id">
<td>{{user.id}}</td>
<td>{{user.name}}</td>
<td>{{user.email}}</td>
<td>{{user.type}}</td>
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
        <h5 class="modal-title" id="addNewLabel">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit.prevent="createUser">
        <div class="form-group">
        <input v-model="form.name" type="text" name="name" placeholder="name" class="form-control" :class="{'is-invalid': form.errors.has('name')}">
        <has-error :form="form" field="name"></has-error>
        </div>

        <div class="form-group">
        <input v-model="form.email" type="email" name="email" placeholder="email" class="form-control" :class="{'is-invalid': form.errors.has('email')}">
        <has-error :form="form" field="email"></has-error>
        </div>

        <div class="form-group">
        <input v-model="form.type" type="text" name="type" placeholder="type" class="form-control" :class="{'is-invalid': form.errors.has('type')}">
        <has-error :form="form" field="type"></has-error>
        </div>

        <div class="form-group">
        <input v-model="form.password" type="password" name="password" placeholder="password" class="form-control" :class="{'is-invalid': form.errors.has('password')}">
        <has-error :form="form" field="password"></has-error>
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
                users : {},
                form: new Form({
                    name: '',
                    email: '',
                    type: '',
                    password: ''
                })
            }
        },
        methods: {
            editUser(user){
                this.form.reset();
                $('#addNew').modal('show');
            },
            loadUser(){
                // this.form.get('api/user');
                Axios.get("api/user").then(({ data }) => (this.users = data.data));
            },
            createUser(){
                this.form.post('api/user');
                $('#addNew').modal('hide')
                toast({
                    type: 'Success',
                    title: 'User Addess Succesfully'
                })
                // Axios.post("api/user").then(({ data }) => (this.users = data));
            }

        },
        created() {
            this.loadUser();
        }
    }
</script>
