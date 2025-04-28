@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fixed">
    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
     <div class="flex flex-col justify-center gap-2">
      <h1 class="text-xl font-medium leading-none text-gray-900">
      Create Order
      </h1>
      <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
    Create Order
      </div>
     </div>
     <div class="flex items-center gap-2.5">
      {{-- <a class="btn btn-sm btn-light" href="#">
        Create User
      </a>
      <a class="btn btn-sm btn-primary" href="#">
        Create User
      </a> --}}
     </div>
    </div>
   </div>
   <!-- End of Container -->
   <!-- Container -->
   <div class="container-fixed">
    <div class="grid gap-5 lg:gap-7.5 xl:w-[38.75rem] mx-auto">
     <div class="card pb-2.5">
      <div class="card-header" id="basic_settings">
       <h3 class="card-title">
        Create Order
       </h3>
       
      </div>
      <form action="{{ route ('customer.order.add_order')}}" method="Post">
        @csrf
        <div class="card-body grid gap-5">
            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                <label class="form-label max-w-56">
                Select Order
                </label>
               <select class="select" name="role_id" id="">
                <option value=""></option>
                <option value="2">Customer</option>
                <option value="3">Publisher</option>
                <option value="4">Content Writer</option>
                <option value="5">Moderation</option>
               </select>
               </div>
           <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label max-w-56">
             Name
            </label>
            <input class="input" type="text" name="name" placeholder="Write Your Name" value=""/>
           </div>
          
           <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label max-w-56">
             Email
            </label>
            <input class="input" type="text" value="" name="email" placeholder="Write Your Email"/>
           </div>
           <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label max-w-56">
             Password
            </label>
            <input class="input" placeholder="Write Your Password" name="password" type="password" value=""/>
           </div>
           <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label max-w-56">
             Phone number
            </label>
            <input class="input" placeholder="Write Your Phone number" name="phone" type="text" value=""/>
           </div>
           <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label max-w-56">
             Address
            </label>
            <input class="input" placeholder="Write Your Address" name="address" type="text" value=""/>
           </div>
          
           <div class="flex justify-end">
            <button class="btn btn-primary" type="submit">
             Save 
            </button>
           </div>
          </div>
      </form>
     </div>
   
     
    </div>
   </div>
   
@endsection


