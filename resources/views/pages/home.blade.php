@extends('layouts.master')

@section('title', 'Home Page')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css')}}">
@endpush

@section('content') 
    <div class="container-fluid container-induk">
        <div class="left-panel resizable-panel">
                
        </div>
        <div class="divider"></div>
        <div class="right-panel resizable-panel">

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const divider = document.querySelector('.divider');
            const leftPanel = document.querySelector('.left-panel');
            const rightPanel = document.querySelector('.right-panel');

            let isResizing = false;

            divider.addEventListener('mousedown', (e) => {
                isResizing = true;
                document.body.style.cursor = 'col-resize';
            });

            document.addEventListener('mousemove', (e) => {
                if (!isResizing) return;

                const container = document.querySelector('.container-induk');
                const containerRect = container.getBoundingClientRect();
                const newLeftWidth = ((e.clientX - containerRect.left) / containerRect.width) * 100;

                if (newLeftWidth >= 10 && newLeftWidth <= 90) {
                    leftPanel.style.width = `${newLeftWidth}%`;
                    rightPanel.style.width = `${100 - newLeftWidth}%`;
                }
            });

            document.addEventListener('mouseup', () => {
                if (isResizing) {
                    isResizing = false;
                    document.body.style.cursor = 'default';
                }
            });
        });
    </script>
@endpush

