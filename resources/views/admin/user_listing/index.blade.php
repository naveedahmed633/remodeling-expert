@extends('layouts.admin-layout')
@section('title', 'All User Listing')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <!-- left column -->
                <div class="col-md-12 mt-5">

                    <div class="card card-primary card-box-shadow">

                        <div class="card-body">
                            <h2>User Listing </h2>

                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Blocked/Activated</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($get_user_listing as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$user->first_name}}</td>
                                        <td>{{$user->last_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->email_verified == 0  ? 'Active' : 'In Active'}}</td>
                                        <td>
                                            <form action="{{ route('admin.user.status', $user->id) }}" method="POST">
                                                @csrf
                                                <input type="checkbox" name="status" value="blocked" {{ $user->status === 'active' ? 'checked' : '' }} onChange="this.form.submit()">
                                            </form>
                                        </td>


                                    </tr>
                                    @endforeach

                                </tbody>

                            </table>

                        </div>


                        <!-- /.card -->
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
@section('script')

<script>
    $(document).ready(function() {
        $("table").DataTable({});
    });
</script>

@endsection