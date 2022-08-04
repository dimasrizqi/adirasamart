<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
      <table border="1"  cellspacing="5" >
        @foreach ($datashortlink as $no => $item)
        
        @if ($no % 7 ==0)
            <tr>
            <td align="center" >
                 <img width="100" src="https://chart.googleapis.com/chart?chd=h&chs=120x120&cht=qr&chl={{$host}}/{{$item->shortlink}}"></img><br>
            {{ $item->nama_link}} 
            </td>
        @else
            <td align="center" border="1"> <img width="100" src="https://chart.googleapis.com/chart?chd=l&chs=120x120&cht=qr&chl={{$host}}/{{$item->shortlink}}"></img><br>
            {{ $item->nama_link }} 
            </td>
        @endif
        @endforeach  
        </tr>
      </table>
  </body>
</html>