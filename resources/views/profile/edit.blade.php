@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="bg-orange-500 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">{{ __('Profile Settings') }}</h1>
            </div>
            
            <div class="divide-y divide-gray-200">
                <!-- Profile Information Section -->
                <div class="px-6 py-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
                
                <!-- Update Password Section -->
                <div class="px-6 py-4">
                    @include('profile.partials.update-password-form')
                </div>
                
                <!-- Delete Account Section -->
                <div class="px-6 py-4">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection