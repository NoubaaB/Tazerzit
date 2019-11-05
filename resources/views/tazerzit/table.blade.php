@extends("layouts.main")
@section('title','Reserver Tables')
@section("content")
<style type="text/css">
    body {
        color: #fff;
        background: url('{{asset("images/bg_3.jpg")}}';
            font-family: 'Roboto', sans-serif;
        }

        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            margin: 30px auto;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            color: #fff;
            background: #40b2cd;
            padding: 16px 25px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .search-box {
            position: relative;
            float: right;
        }

        .search-box .input-group {
            min-width: 300px;
            position: absolute;
            right: 0;
        }

        .search-box .input-group-addon, .search-box input {
            border-color: #ddd;
            border-radius: 0;
        }

        .search-box input {
            height: 34px;
            padding-right: 35px;
            background: #f4fcfd;
            border: none;
            border-radius: 2px !important;
        }

        .search-box input:focus {
            background: #fff;
        }

        .search-box input::placeholder {
            font-style: italic;
        }

        .search-box .input-group-addon {
            min-width: 35px;
            border: none;
            background: transparent;
            position: absolute;
            right: 0;
            z-index: 9;
            padding: 6px 0;
        }

        .search-box i {
            color: #a0a5b1;
            font-size: 19px;
            position: relative;
            top: 2px;
        }

        table.table {
            table-layout: fixed;
            margin-top: 15px;
        }

        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table th:first-child {
            width: 60px;
        }

        table.table th:last-child {
            width: 120px;
        }

        table.table td a {
            color: #a0a5b1;
            display: inline-block;
            margin: 0 5px;
        }

        table.table td a.view {
            color: #03A9F4;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }
</style>
<link rel="stylesheet" href="{{asset('css/css/draggSlide.css')}}">
<script src="{{asset('js/draggSlide.js')}}"></script>

<section id="table" class="container pt-5 mt-5 ">


    <div class="gallery js-flickity pt-5" style="height :auto !important;width:auto !important;" >
        <div >
            <div class="table-wrapper" >
                <div class="table-title ">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Customer <b>Tables Booking Detail</b></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Prenom</th>
                                <th style="width: 10%;">Date</th>
                                <th>Time</th>
                                <th style="width: 22%;">Phone Number</th>
                                <th style="width: 33%;">Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="table in tables">
                                <td>@{{table.id}}</td>
                                <td>@{{table.lname}}</td>
                                <td>@{{table.fname}}</td>
                                <td>@{{table.date}}</td>
                                <td>@{{table.time}}</td>
                                <td>@{{table.phone}}</td>
                                <td>@{{table.message}}</td>
                                <td>
                                    <a @click="deleteTable(table)" title="Delete" class="btn btn-primary btn-outline-primary" data-toggle="modal"><i class="icon-delete"></i></a> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div >
            <div class="table-wrapper">
                <div class="table-title ">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Customer <b>Hostel Booking Detail</b></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Prenom</th>
                                <th style="width: 22%;">Country</th>
                                <th style="width: 22%;">Phone Number</th>
                                <th>Email</th>
                                <th style="width: 22%;">Pack Name</th>
                                <th style="width: 12%;">Pack Prix</th>
                                <th style="width: 15%;">Pack Day(s)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="book in books">
                                <td>@{{book.id}}</td>
                                <td>@{{book.lname}}</td>
                                <td>@{{book.fname}}</td>
                                <td>@{{book.country}}</td>
                                <td>@{{book.phone}}</td>
                                <td>@{{book.email}}</td>
                                <td>@{{book.hostel.nom}}</td>
                                <td>@{{book.hostel.prix}}</td>
                                <td>@{{book.hostel.day}}</td>
                                <td>
                                    <a @click="deleteBook(book)" title="Delete" class="btn btn-primary btn-outline-primary" data-toggle="modal"><i class="icon-delete"></i></a> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    new Vue({
        el: "#table",
        data: {
            books: [],
            book: {
                id: 0,
                fname: '',
                lname: '',
                country: '',
                phone: '',
                email: '',
                created_at: '',
                updated_at: '',
                hostel: {
                    id: 0,
                    nom: "",
                    description: "",
                    image: "",
                    prix: "",
                    day: "",
                    created_at: '',
                    updated_at: '',
                }
            },
            tables: [],
            table: {
                id: 0,
                fname: "",
                lname: "",
                date: "",
                time: "",
                phone: "",
                message: "",
            }
        },
        methods: {
            getBooks: function() {
                axios.get('{{route("book.index")}}').then((response) => {
                    this.books = response.data;
                    console.log(this.books);
                }).catch((errors) => {
                    console.log(errors);
                });
            },
            deleteBook: function(book) {
                this.book = book;
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(() => {

                    axios.delete(`{{url("book")}}/${book.id}`).then((response) => {
                        var position = this.books.indexOf(this.book);
                        this.books.splice(position, 1)
                        console.log(response.data);
                    }).catch((erorrs) => {
                        console.log(erorrs);
                    });

                    swal(
                        'Deleted!',
                        'one Reservation has been deleted.',
                        'success'
                    )

                });
            },
            getTables: function() {
                axios.get('{{route("tables")}}').then((response) => {
                    this.tables = response.data;
                }).catch((errors) => {
                    console.log(errors);
                });
            },
            deleteTable: function(table) {
                this.table = table;
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(() => {

                    axios.delete('{{route("table.destroy",0)}}', {
                        headers: {
                            Authorization: document.getElementsByName('_token')[1].value
                        },
                        data: {
                            source: this.table.id
                        }
                    }).then((response) => {
                        var position = this.tables.indexOf(this.table);
                        this.tables.splice(position, 1)
                        console.log(response.data);
                    }).catch((erorrs) => {
                        console.log(erorrs);
                    });

                    swal(
                        'Deleted!',
                        'one Reservation has been deleted.',
                        'success'
                    )

                });
            }
        },
        mounted: function() {
            this.getTables();
            this.getBooks();
        },
    });
</script>
@endsection