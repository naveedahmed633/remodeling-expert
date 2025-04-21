<h2>Hi {{ $emailData['name'] }},</h2>

<p>Thank you for your request. Here’s a summary of your selections:</p>

<h4>Step 1: Selected Services</h4>
<ul>
    @foreach ($emailData['services']['titles'] ?? [] as $title)
        <li>{{ $title }}</li>
    @endforeach
</ul>

<h4>Step 2: Selected Subcategories</h4>
<ul>
    @foreach ($emailData['subcategories']['titles'] ?? [] as $title)
        <li>{{ $title }}</li>
    @endforeach
</ul>

<h4>Step 3: Remodel Type</h4>
<p>{{ ucfirst($emailData['remodelType'] ?? 'N/A') }}</p>

<h4>Step 4: Specific Requirements</h4>
<ul>
    @foreach ($emailData['subchild']['titles'] ?? [] as $title)
        <li>{{ $title }}</li>
    @endforeach
</ul>

<p>We will be in touch with you shortly!</p>
