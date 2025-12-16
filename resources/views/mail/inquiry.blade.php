<p>Type: {{ ucfirst($inquiry->type) }}</p>
<p>Name: {{ $inquiry->name }} ({{ $inquiry->email }})</p>
@if($inquiry->company)
<p>Company: {{ $inquiry->company }}</p>@endif
<p>Subject: {{ $inquiry->subject }}</p>
<pre style="white-space:pre-wrap">{{ $inquiry->message }}</pre>