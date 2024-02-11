<div>
    <style>
        table {
          border-collapse: collapse;
          width: 100%;
        }

        th, td {
          padding: 8px;
          text-align: left;
          border-bottom: 1px solid #ddd;
        }

        tr:hover {background-color: coral;}
        </style>
    <table>
        <tr>
          <th>اسم المستخدم</th>
          <th>الاشترك</th>
          <th>التاريخ</th>
          <th>العليات</th>

        </tr>
        @foreach ( $orders as $order)

        <tr>
          <td>{{  $order->id }}</td>
          <td>{{  $order->id }}</td>
          <td>{{  $order->id }}</td>
          <td>{{  $order->id }}</td>

        </tr>
        @endforeach

      </table>
</div>
