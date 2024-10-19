<div class="text_info_title_box style_2">
    <h1 class="sec_title">{{ $title }}</h1>
    <div class="info_right_side_box">
        <a href="{{ route('merchant.schedule.edit', $schedule->id) }}">
            <div class="add_new_food_item">
                <div class="add_btn">Edit {{ $title }} <i class="flaticon-pencil"></i></div>
            </div>
        </a>
    </div>
</div>
<div class="store_hours_table">
    <table>
        <tbody>
            <tr>
                <td>Sunday</td>
                <td>{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->sunday['from'])->format('h:i A') }}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->sunday['to'])->format('h:i A') }}</td>
            </tr>
            <tr>
                <td>Monday</td>
                <td>{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->monday['from'])->format('h:i A') }}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->monday['to'])->format('h:i A') }}</td>
            </tr>
            <tr>
                <td>Tuesday</td>
                <td>{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->tuesday['from'])->format('h:i A') }}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->tuesday['to'])->format('h:i A') }}</td>
            </tr>
            <tr>
                <td>Wednesday</td>
                <td>{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->wednesday['from'])->format('h:i A') }}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->wednesday['to'])->format('h:i A') }}</td>
            </tr>
            <tr>
                <td>Thursday</td>
                <td>{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->thursday['from'])->format('h:i A') }}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->thursday['to'])->format('h:i A') }}</td>
            </tr>
            <tr>
                <td>Friday</td>
                <td>{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->friday['from'])->format('h:i A') }}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->friday['to'])->format('h:i A') }}</td>
            </tr>
            <tr>
                <td>Saturday</td>
                <td>{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->saturday['from'])->format('h:i A') }}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->saturday['to'])->format('h:i A') }}</td>
            </tr>
        </tbody>
    </table>
</div>
