@extends('layouts.dashboard')

@section('title', 'Platform Settings')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Platform Settings</h2>
</div>

<div class="card border-0 shadow-sm" style="max-width: 800px;">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.settings.save') }}">
            @csrf
            @php
                $definedKeys = [
                    'site_name' => ['type' => 'text', 'label' => 'Site Name'],
                    'site_description' => ['type' => 'textarea', 'label' => 'Site Description'],
                    'support_email' => ['type' => 'email', 'label' => 'Support Email'],
                    'support_phone' => ['type' => 'text', 'label' => 'Support Phone'],
                    'platform_fee_percent' => ['type' => 'number', 'label' => 'Platform Fee (%)'],
                    'max_file_upload_size' => ['type' => 'number', 'label' => 'Max File Upload Size (MB)'],
                    'babysitter_approval_required' => ['type' => 'select', 'label' => 'Babysitter Approval Required', 'options' => ['1' => 'Yes', '0' => 'No']],
                    'maintenance_mode' => ['type' => 'select', 'label' => 'Maintenance Mode', 'options' => ['1' => 'Enabled', '0' => 'Disabled']],
                    'terms_of_service' => ['type' => 'wysiwyg', 'label' => 'Terms of Service'],
                    'privacy_policy' => ['type' => 'wysiwyg', 'label' => 'Privacy Policy'],
                    'about_us' => ['type' => 'wysiwyg', 'label' => 'About Us'],
                ];
            @endphp

            @foreach($definedKeys as $key => $config)
                @php $value = $settings[$key] ?? ''; @endphp
                <div class="mb-3">
                    <label class="form-label">{{ $config['label'] }}</label>
                    @if($config['type'] === 'wysiwyg')
                        <textarea name="{{ $key }}" class="form-control" rows="6">{{ $value }}</textarea>
                    @elseif($config['type'] === 'textarea')
                        <textarea name="{{ $key }}" class="form-control" rows="3">{{ $value }}</textarea>
                    @elseif($config['type'] === 'select')
                        <select name="{{ $key }}" class="form-select">
                            @foreach($config['options'] as $optVal => $optLabel)
                                <option value="{{ $optVal }}" @selected((string)$value === (string)$optVal)>{{ $optLabel }}</option>
                            @endforeach
                        </select>
                    @else
                        <input type="{{ $config['type'] }}" name="{{ $key }}" class="form-control" value="{{ $value }}">

@endif
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Save Settings
            </button>
        </form>
    </div>
</div>
@endsection