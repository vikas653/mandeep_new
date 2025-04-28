@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fixed">
    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
        <div class="flex flex-col justify-center gap-2">
            <h1 class="text-xl font-medium leading-none text-gray-900">
                Dashboard
            </h1>
            <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
                Its admin dashboard
            </div>  
        </div>
    </div>

    <div class="container-fixed">
        <div class="grid gap-5 lg:gap-7.5">
            <!-- begin: grid -->
            <div class="grid lg:grid-cols-3 gap-y-5 lg:gap-7.5 items-stretch">
                <!-- Card 1 -->
                <div class="lg:col-span-1">
                    <div class="grid grid-cols-1 gap-5 lg:gap-7.5 h-full items-stretch">
                        <style>
                            .channel-stats-bg {
                                background-image: url('assets/media/images/2600x1600/bg-3.png');
                            }
                            .dark .channel-stats-bg {
                                background-image: url('assets/media/images/2600x1600/bg-3-dark.png');
                            }
                        </style>
                        <div class="card flex-col justify-between gap-6 h-full bg-cover rtl:bg-[left_top_-1.7rem] bg-[right_top_-1.7rem] bg-no-repeat channel-stats-bg">
                            <img alt="" class="w-7 mt-4 ms-5" src="assets/media/brand-logos/linkedin-2.svg"/>
                            <div class="flex flex-col gap-1 pb-4 px-5">
                                <span class="text-3xl font-semibold text-gray-900">
                                    {{$customer}}
                                </span>
                                <span class="text-sm font-normal text-gray-700">
                                    Customer
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="lg:col-span-1">
                    <div class="grid grid-cols-1 gap-5 lg:gap-7.5 h-full items-stretch">
                        <div class="card flex-col justify-between gap-6 h-full bg-cover rtl:bg-[left_top_-1.7rem] bg-[right_top_-1.7rem] bg-no-repeat channel-stats-bg">
                            <img alt="" class="w-7 mt-4 ms-5" src="assets/media/brand-logos/linkedin-2.svg"/>
                            <div class="flex flex-col gap-1 pb-4 px-5">
                                <span class="text-3xl font-semibold text-gray-900">
                                    {{$publisher}}
                                </span>
                                <span class="text-sm font-normal text-gray-700">
                                    Publisher
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="lg:col-span-1">
                    <div class="grid grid-cols-1 gap-5 lg:gap-7.5 h-full items-stretch">
                        <div class="card flex-col justify-between gap-6 h-full bg-cover rtl:bg-[left_top_-1.7rem] bg-[right_top_-1.7rem] bg-no-repeat channel-stats-bg">
                            <img alt="" class="w-7 mt-4 ms-5" src="assets/media/brand-logos/linkedin-2.svg"/>
                            <div class="flex flex-col gap-1 pb-4 px-5">
                                <span class="text-3xl font-semibold text-gray-900">
                                    {{$content_writer}}
                                </span>
                                <span class="text-sm font-normal text-gray-700">
                                    Content Writer
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="lg:col-span-1">
                    <div class="grid grid-cols-1 gap-5 lg:gap-7.5 h-full items-stretch">
                        <div class="card flex-col justify-between gap-6 h-full bg-cover rtl:bg-[left_top_-1.7rem] bg-[right_top_-1.7rem] bg-no-repeat channel-stats-bg">
                            <img alt="" class="w-7 mt-4 ms-5" src="assets/media/brand-logos/linkedin-2.svg"/>
                            <div class="flex flex-col gap-1 pb-4 px-5">
                                <span class="text-3xl font-semibold text-gray-900">
                                    {{$moderation}}
                                </span>
                                <span class="text-sm font-normal text-gray-700">
                                    Moderation
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: grid -->
        </div>
    </div>
</div>

@endsection
