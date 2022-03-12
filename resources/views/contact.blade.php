<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<table>
	<tr>
		<th>Name</th>
	</tr>
	@foreach($data['contact'] as $key => $value)
		<tr>
			<td>{{ $value->name }}</td>
		</tr>
	@endforeach
</table>