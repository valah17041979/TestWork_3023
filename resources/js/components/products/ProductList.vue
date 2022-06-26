<template>
    <div class="container mt-3">
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div><hr>
        <div class="form-group">
            <router-link to="/product-create" class="btn btn-primary">Create new product</router-link>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Products list</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>№ </th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Cat id </th>
                        <th>Cat name</th>
                        <th width="100">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="text-align:center" v-for="company, index in companies">
                        <td>{{ company.id }}</td>
                        <td>{{ company.name }}</td>
                        <td>{{ company.description }}</td>
                        <td>{{ company.category_id }}</td>
                        <td>{{ company.category_name }}</td>
                      
                        <td>
                        <router-link :to="/product-edit/+ company.id">
                           <button class="btn btn btn-sm btn-primary">Edit </button>
                         </router-link>
                         <hr>
                       
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(company.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</template>
 
<script>
import axios from 'axios';

    export default {
      data: function () {
            return {
              companies: [],
            }
        },
    async mounted() {
            let app = this;  
       await axios.get('/api/products/')
                .then(function (resp) {
                    app.companies = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load products");
                });
               
        },
      
        methods: {
           async  deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                 await axios.delete('/api/products/' + id)
                        .then(function (resp) {
                            app.companies.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete company");
                        });
                }
            }
        }
    }
</script>
<style scoped>

</style>
