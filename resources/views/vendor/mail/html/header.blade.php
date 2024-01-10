@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'StrokeCare')
<img src="https://strokecare.agungdwisahputra.my.id/images/favicon.png" style="width:50px; height:50px;" class="logo" alt="StrokeCare Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
