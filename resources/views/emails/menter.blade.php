<p>{{ $m_name }}様、お疲れ様です。</p>
<p class="mb-4">{{ $username }}です。</p>

<p class="mb-4">タイムアタックの結果です。ご確認のほどよろしくお願いします。</p>

<table>
    <tr class="mb-2">
      <th class="mr-5 flex shrink-0">タイマー:</th>
      <td>
        @if($type == \Constant::MINUTES['fifteen'])
        15分タイマー
        @elseif($type == \Constant::MINUTES['thirty'])
        30分タイマー
        @endif
      </td>
    </tr>
    <tr class="mb-2">
      <th class="mr-5 flex shrink-0">結果:</th>
      <td>
        @if($type == \Constant::JUDGE['loser'])
        制限時間内に解決しませんでした。
        @elseif($type == \Constant::JUDGE['winner'])
        制限時間内に解決しました。
        @endif
      </td>
    </tr>
    <tr class="mb-2">
      <th class="mr-5 flex shrink-0">コメント:</th>
      <td>
        {{ $comment }}
      </td>
    </tr>
  </table>