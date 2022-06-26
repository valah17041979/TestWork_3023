<template>
<div class="col-md-12">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit this product -  {{ company.name }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Edit product</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

   
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
           
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">  <router-link to="/products" class="btn btn-primary">
                  <i class="right fas fa-angle-left"></i>
                Back all products</router-link></h3>
              </div>
              
                <form id="quickForm" v-on:submit="saveForm()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>

                    <input type="text"  class="form-control" v-model="company.name" placeholder="">

                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                     <textarea class="form-control" v-model="company.description" placeholder="description"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>

                    <input type="text"  class="form-control" v-model="company.price" placeholder="">

                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Code</label>
                     <input type="text"  class="form-control" v-model="company.code" placeholder="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Current Category  id</label>
                     <input type="text"  class="form-control" v-model="company.category_id" placeholder="">
                  </div>

                 <div class="form-group">
                    <label for="exampleInputPassword1">Category Id</label>
                      <select v-model="company.category_id" class="form-control" >
                     <option v-for="category, index in categories"
                      v-bind:value="category.id">
                        {{ category.name }}
                      </option>
                    </select>
                  </div>

                </div>
               
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          
            </div>
         
        </div>
        
      </div>
    </section>
  
  </div>

</template>
<script>
    export default {
      data: function () {
            return {
                categories: [],
                companyId: null,
                company: [],
            }
        },

        mounted() {
          
            let app_category = this;  
            axios.get('/api/categories/').then(function (response)
            {
            app_category.categories = response.data;
            })
             
            let app = this;
            let id = app.$route.params.id;
            app.companyId = id;
            axios.get('/api/products/' + id)
            .then(function (resp) {
            app.company = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load product");
                });     

        },
          
       
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newCompany = app.company;
                axios.patch('/api/products/' + app.companyId, newCompany)
                    .then(function (resp) {
                        app.$router.replace('/products');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your company");
                    });
            }
        }
    }
</script>
<style scoped>

</style>
