<template>
    <div class="col-md-12">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit this category - {{ company.name }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Edit this category</li>
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
                 <router-link to="/categories" class="btn btn-primary">Back all categories</router-link>
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
                     <input type="text"  class="form-control" v-model="company.description" placeholder="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Code</label>
                     <input type="text"  class="form-control" v-model="company.code" placeholder="">
                  </div>
                </div>
              
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</template>
<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.companyId = id;
            axios.get('/api/categories/' + id)
            .then(function (resp) {
                    app.company = resp.data;

                })

                .catch(function () {

                    alert("Could not load your company")
                });

        },
          data: function () {
            return {
                companyId: null,
                company: [],
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newCompany = app.company;
                axios.patch('/api/categories/' + app.companyId, newCompany)
                    .then(function (resp) {
                        app.$router.replace('/categories');
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
