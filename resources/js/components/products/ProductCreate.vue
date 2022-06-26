<template>
    <div class="col-md-12">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create new product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Create new product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <router-link to="/products" class="btn btn-primary">
                     <i class="right fas fa-angle-left"></i>
                    Back all products
                  </router-link>
                 </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
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
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
    import axios from 'axios'
    export default {
        data: function () {
            return {
                categories: [],
                company: {
                    name: '',
                    description: '',
                    code: '',
                    category_id: '',
                    price: '',
                    
                }
            }
        },

         async mounted() {
            let app = this;  
            await axios.get('/api/categories/')
            .then(function (response) {
             app.categories = response.data;
                })
                .catch(function (response) {
                    console.log(response);
                    alert("Could not load companies");
                });
           },
     
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newCompany = app.company;
                axios.post('/api/products', newCompany)
                    .then(function (resp) {
                        app.$router.push({path: '/products'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your company");
                    });
            }
        },
    }
</script>
<style scoped>

</style>
