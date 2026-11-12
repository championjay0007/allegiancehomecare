<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; max-width: 600px; margin: auto; padding: 20px; }
        h2 { color: #333; }
        .label { font-weight: bold; display: inline-block; width: 180px; }
        .row { margin-bottom: 10px; }
    </style>
</head>
<body>

<h2>New Feedback / Complaint Received</h2>

<div class="row">
    <span class="label">Submitted by:</span>
    {{ $feedback->anonymous ? 'Anonymous' : ($feedback->name ?: 'N/A') }}
</div>

@if (!$feedback->anonymous)
<div class="row">
    <span class="label">Email:</span>
    {{ $feedback->email ?? 'N/A' }}
</div>
@endif

<div class="row">
    <span class="label">Category:</span>
    {{ $feedback->category }}
</div>

<div class="row">
    <span class="label">Submitted Anonymously:</span>
    {{ $feedback->anonymous ? 'Yes' : 'No' }}
</div>

<div class="row">
    <span class="label">Message:</span>
    <br>
    {{ $feedback->message }}
</div>

<div class="row">
    <span class="label">Date:</span>
    {{ $feedback->created_at->format('d M Y H:i') }}
</div>

</body>
</html>