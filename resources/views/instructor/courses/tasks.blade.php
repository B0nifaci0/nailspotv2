<x-instructor-layout :course="$course">
    <div class="my-8">
        @livewire('instructor.courses-tasks', ['course' => $course])
    </div>
</x-instructor-layout>
    <script>
    $(document).ready(function(){
        window.livewire.on('alert_remove',()=>{
            setTimeout(function(){ $(".alert").slideUp(800);
            }, 3000);
        });
    });
    </script>