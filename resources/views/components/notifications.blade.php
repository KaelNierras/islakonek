@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showNotification('Success', '{{ session('success') }}', 'success');
        });
    </script>
@endif

@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showNotification('Error', '{{ session('error') }}', 'error');
        });
    </script>
@endif