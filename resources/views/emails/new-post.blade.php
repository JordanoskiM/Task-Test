@component('mail::message')
New Post

{{ $data['title'] }}

{{ $data['description'] }}

@component('mail::button', ['url' => route('show.post.details', [$data['website_id'], $data['postId']])])
    View Post
@endcomponent
@component('mail::button', ['url' => route('unsubscribe', [$data['email'], $data['website_id']])])
    Unsubscribe
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
