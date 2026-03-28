@extends('vendor.layout')

@section('content')

<div class="flex h-[85vh] bg-gray-100 rounded-xl overflow-hidden shadow">

    <!-- Sidebar -->
    <div class="w-1/3 bg-white border-r overflow-y-auto">
        <div class="p-4 font-semibold text-lg border-b">Users</div>

        @foreach($users as $user)
            <div class="user-item p-4 cursor-pointer border-b flex items-center gap-3 hover:bg-gray-100 transition"
                 data-id="{{ $user->id }}" data-email="{{ $user->email }}">

                <div class="w-10 h-10 bg-blue-500 text-white flex items-center justify-center rounded-full">
                    {{ strtoupper(substr($user->name,0,1)) }}
                </div>

                <div>
                    <div class="font-medium">{{ $user->name }}</div>
                    <div class="text-xs text-gray-400">Click to chat</div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Chat -->
    <div class="w-2/3 flex flex-col">

        {{-- <div class="p-4 bg-white border-b font-semibold">Chat</div> --}}
        <div class="p-4 bg-white border-b flex justify-between items-center">
            <div class="font-semibold">Chat</div>

            <button id="openEmail"
                class="bg-green-500 text-white px-4 py-2 rounded-lg hidden">
                Send Email
            </button>
        </div>

        <div id="messages" class="flex-1 p-4 overflow-y-auto space-y-2 bg-gray-50"></div>

        <div class="p-3 bg-white border-t flex gap-2">
            <input id="msg" class="flex-1 border rounded-full px-4 py-2">
            <button id="sendBtn" class="bg-blue-500 text-white px-5 py-2 rounded-full">Send</button>
        </div>

    </div>
</div>

<div id="emailModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">

    <div class="bg-white w-[400px] p-5 rounded-lg shadow-lg">
        <h2 class="text-lg font-semibold mb-3">Send Email</h2>

        <textarea id="emailMessage"
            class="w-full border rounded p-2 h-32"
            placeholder="Type your email message..."></textarea>

        <div class="flex justify-end gap-2 mt-3">
            <button id="closeEmail" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
            <button id="sendEmailBtn" class="px-4 py-2 bg-green-500 text-white rounded">Send</button>
        </div>
    </div>

</div>
@endsection


@push('scripts')
<script>

document.addEventListener('DOMContentLoaded', function () {

let currentUser = null;
let myId = parseInt({{ $vendorId }});

let currentUserEmail = null;


// Open modal
document.getElementById('openEmail').onclick = function() {
    document.getElementById('emailModal').classList.remove('hidden');
    document.getElementById('emailModal').classList.add('flex');
};

// Close modal
document.getElementById('closeEmail').onclick = function() {
    let modal = document.getElementById('emailModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex'); // ✅ important
};

// CLICK USER
// document.querySelectorAll('.user-item').forEach(el => {
//     el.addEventListener('click', function() {

//         document.querySelectorAll('.user-item').forEach(i =>
//             i.classList.remove('bg-blue-100','border-l-4','border-blue-500')
//         );

//         this.classList.add('bg-blue-100','border-l-4','border-blue-500');

//         currentUser = parseInt(this.dataset.id);
//         currentUserEmail = this.dataset.email;
//         loadMessages();
//     });
// });

document.querySelectorAll('.user-item').forEach(el => {
    el.addEventListener('click', function() {

        document.querySelectorAll('.user-item').forEach(i =>
            i.classList.remove('bg-blue-100','border-l-4','border-blue-500')
        );

        this.classList.add('bg-blue-100','border-l-4','border-blue-500');

        currentUser = parseInt(this.dataset.id);
        currentUserEmail = this.dataset.email;

        // ✅ SHOW EMAIL BUTTON
        document.getElementById('openEmail').classList.remove('hidden');

        loadMessages();
    });
});

// LOAD
function loadMessages() {

    if (!currentUser) return;

    fetch('/chat/messages/' + currentUser)
    .then(res => res.json())
    .then(data => {

        let html = '';

        data.forEach(m => {

            let me = parseInt(m.sender_id) === myId;

            let align = me ? 'justify-end' : 'justify-start';
            let bubble = me ? 'bg-blue-500 text-white' : 'bg-gray-200';

            html += `
                <div class="flex ${align}">
                    <div class="${bubble} px-4 py-2 rounded-2xl max-w-xs break-words">
                        ${m.message}
                    </div>
                </div>
            `;
        });

        let box = document.getElementById('messages');
        box.innerHTML = html;
        box.scrollTop = box.scrollHeight;
    });
}

// SEND
document.getElementById('sendBtn').addEventListener('click', send);

function send() {

    let msg = document.getElementById('msg').value;

    if (!msg || !currentUser) return;

    fetch('/chat/send', {
        method:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },
        body: JSON.stringify({
            receiver_id: currentUser,
            message: msg
        })
    }).then(()=>{
        document.getElementById('msg').value='';
        loadMessages();
    });
}

document.getElementById('sendEmailBtn').onclick = function() {

    let message = document.getElementById('emailMessage').value;

    if (!message || !currentUserEmail) return;

    fetch('/send-email', {
        method: 'POST',
        headers: {
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },
        body: JSON.stringify({
            email: currentUserEmail,
            message: message
        })
    })
    .then(res => res.json())
    .then(() => {
         alert("Email Sent ✅");
        document.getElementById('emailMessage').value = '';

        let modal = document.getElementById('emailModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex'); // ✅ fix
    });
};

// AUTO REFRESH
setInterval(loadMessages, 2000);

});
</script>
@endpush