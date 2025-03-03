@if (session('message'))
    <div class="w-full bg-green-400 p-3 my-3 rounded-md" id="message-box">
        {{ session('message') }}
    </div>
@endif

@if (session('error'))
    <div class="w-full bg-red-400 p-3 my rounded-md" id="message-box">
        {{ session('error') }}
    </div>
@endif

<script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('hide-message', function () {
                setTimeout(() => {
                    let messageBox = document.getElementById('message-box');
                    if (messageBox) {
                        messageBox.style.display = 'none';
                    }
                }, 3000); 
            });
        });
    </script>