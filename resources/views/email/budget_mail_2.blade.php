<x-mail::message>
# Budget Mail

<h2 class="text-red-800">You've either reached 70% or more of your budget.</h2>
Budget: {{ $data['my_budget']->description }} with amount {{ $data['my_budget']->amount }}
Connected expenses Amount: {{ $data['my_expenses'] }}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
