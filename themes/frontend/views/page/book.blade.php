@extends('layouts.app')

@section('content')
    <div class="mt-12 sm:mt-0">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-12 md:mt-0 md:col-span-2">
                <form action="{{ route('pay') }}" method="POST" class="mt-12">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email_address" class="block text-sm font-medium text-gray-700">Email address</label>
                                    <input type="text" name="email" id="email_address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                  <div class="col-span-6 sm:col-span-3">
                                      <label for="phone_no" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                      <input type="tel" name="phone" id="phone" autocomplete="phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                  </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                    <select name="gender" id="gender" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{ request()->session()->pull('duration') }}
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Pay Now
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection