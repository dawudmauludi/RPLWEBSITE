<x-mail::message>
# Pesan Baru dari {{ $data['full_name'] }}

**Nama:** {{ $data['full_name'] }}  
**Email:** {{ $data['email'] }}  
**Nomor Telepon:** {{ $data['phone_number'] ?? 'Tidak diisi' }}  
**Subjek:** {{ $data['subject'] }}  

**Pesan:**  
{{ $data['message'] }}

<x-mail::button :url="'mailto:' . $data['email']">
Balas Email Ini
</x-mail::button>

Terima kasih,<br>
{{ $data['full_name'] }} 
</x-mail::message>