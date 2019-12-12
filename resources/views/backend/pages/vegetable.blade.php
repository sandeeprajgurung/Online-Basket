@extends('backend.layouts.app')
@section('main-content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            General Form
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div id="vue-wrapper">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Vegetable</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" @submit.prevent="saveForm()">
                        {{-- @csrf --}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="InputName">Name*</label>
                                <input type="text" class="form-control" id="InputName" v-model="newItem.name" placeholder="Enter Fruit name" required>
                            </div>
                            <div class="form-group">
                                <label>Description*</label>
                                <textarea class="form-control" rows="3" v-model="newItem.description" placeholder="Enter ..."></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price*</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">NRs.</span>
                                            <input type="number" class="form-control" v-model.number="newItem.price" required>
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Discount</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" v-model.number="newItem.discount">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type*</label>
                                        <select class="form-control select2" style="width: 100%;" v-on:change="onChange($event)" required>
                                            <option value="0" selected disabled>select type</option>
                                            <option value="1">Vegetable</option>
                                            <option value="2">Fruit</option>
                                            <option value="3">Juice</option>
                                            <option value="4">Dried</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputFile">Upload image*</label>
                                {{-- <img :src="image" class="img-responsive" height="70" width="90"> --}}
                                <input type="file" id="file" ref="file" name="image" v-on:change="onFileChange()">

                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    
                    </form>

                    
                    {{-- </div> --}}
                </div>
                <!-- /.box -->

            </div>
            <!-- /.box -->



            <!-- PRODUCT LIST -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recently Added Products</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul v-for="item in items" class="products-list product-list-in-box">
                            <li class="item">
                                <div class="product-img">
                                    <img :src="item.image" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a @click="setVal(item.id, item.name, item.description, item.price, item.discount)" class="product-title" data-toggle="modal" data-target="#modal-default">@{{ item.name }}
                                        <span class="label label-success pull-right">Rs. @{{ item.price }}</span></a>
                                    <span class="product-description">
                                        @{{ item.description }}
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="javascript:void(0)" class="uppercase">View All Products</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Launch Default Modal
              </button>   
              @include('backend.partials.view_modal')         
        </div>
    </section>
</div>
@endsection

@section('page-script')
<script>
    var app = new Vue({
        el: '#vue-wrapper',

        data: function () {
            return {
                newItem: {
                    name: '',
                    description: '',
                    price: '',
                    discount: '',
                    image: '',

                },
                file: '',
                // image: '',
                items: [],
                name: '',
                description: '',
                price: '',
                discount: '',
            }
        },
        mounted: function mounted() {
            this.fetchItems();
        },
        methods: {
            onFileChange(e){
            // this.newItem.file = e.target.files[0];
            // console.log(e.target.files[0]);
            // this.file = e.target.files[0];
                // let files = e.target.files || e.dataTransfer.files;
                // if (!files.length)
                //     return;
                // this.createImage(files[0]);
                this.file = this.$refs.file.files[0];
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            onChange:function(event){                
                this.type = event.target.value;
            },
            saveForm() {
                var dataForm = new FormData();
                var _this = this;
                // console.log(this.type);
                // console.log(this.file);return false;
                dataForm.append('image', this.file);
                dataForm.append('type', this.type);
                dataForm.append('name', _this.newItem.name);
                dataForm.append('description', _this.newItem.description);
                dataForm.append('price', _this.newItem.price);
                dataForm.append('discount', _this.newItem.discount);
                // dataForm.append('featured_product', _this.newItem.featured_product);
                axios.post('/ob-admin/form', dataForm).then(function (response) {
                    // console.log(response);
                    $(".select2").val("0");
                    _this.newItem = {
                        name: '',
                        description: '',
                        price: '',
                        discount: '',
                        // image: '',
                        // file: '',
                    },
                    this.file = '';
                    this.image = '';
                    
                    _this.fetchItems();
                }).catch(function (error) {
                        console.log(error);
                    });
            },
            fetchItems() {
                var _this = this;
                axios.get('/ob-admin/form', {
                    params: {
                        ajax: 'true'
                    }
                }).then(function (response){
                    _this.items = response.data;
                });
            },
            updateItem() {            
                var _this = this;  
                var dataForm = new FormData();
                $('#modal-default').modal('hide'); 
                dataForm.append('name', $("input[name=name]").val());
                dataForm.append('description', $("textarea[name=description]").val());
                dataForm.append('price', $("input[name=price]").val());
                dataForm.append('discount', $("input[name=discount]").val());
                dataForm.append('featured_product', $("input[name=optionsRadios]:checked").val());
                axios.post('/vegetable/'+this.id, dataForm).then(function (response) {
                    _this.fetchItems();
                }).catch(function (error) {
                        console.log(error);
                    });
            
            },
            setVal(id, name, description, price, discount) {
                // console.log(name);
                this.id = id;
                this.name = name;
                this.description = description;
                this.price = price;
                this.discount = discount; 
            },
        },
    });
    
</script>
<script>  
    function enable_disable() { 
        $("input").prop('disabled', false);
        $("textarea").prop('disabled', false); 
        $("input[type=button]").attr({onclick: "send_post()", value: "Update", class: "btn btn-primary"});
    } 
    function send_post() { 
        $("#send-post-btn").trigger("click");
    } 
    $(document).on('show.bs.modal','#modal-default', function () {
        $("input").prop('disabled', true);
        $("textarea").prop('disabled', true);
        $("input[type=button]").prop('disabled', false);
        $("input[type=button]").attr({ onclick: "enable_disable()", value: "Edit", class: "btn btn-warning"});
    });
    $(document).on('hide.bs.modal','#modal-default', function () {
        $("input").prop('disabled', false);
        $("textarea").prop('disabled', false);
        $("input[type=button]").prop('disabled', false);
        $("input[type=button]").attr({ onclick: "enable_disable()", value: "Edit", class: "btn btn-warning"});
    });
</script>
@endsection