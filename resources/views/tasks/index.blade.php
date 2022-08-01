<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/tasks/index.css">
  <title>Document</title>
</head>
<body>
  @if (Route::currentRouteName() === "tasks.index")
    <h1>タスク一覧</h1>
    <form action="{{ route('tasks.create') }}" method="POST">
    @csrf
      <input type="text" name="title" />
      <button>Add Task</button>
    </form>
  @elseif (Route::currentRouteName() === "tasks.edit")
    <h1>タスク編集</h1>
  @endif
  <div id="table">
    <h2>現在のタスク</h2>
    <ul>
      @foreach ($tasks as $task)
        <li>
          @if (Route::currentRouteName() === "tasks.index")
            <p>{{ $task->title }}</p>
            <form action="{{ route('time_logs.create', $task->id) }}" method="POST">
              @csrf
              <input type="date" name="date">
              <input type="number" name="work_time" placeholder="&#040;分&#041;">
              <button type="submit">記録</button>
            </form>
          @elseif (Route::currentRouteName() === "tasks.edit")
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
              @csrf
              <input type="text" name="title" value="{{ $task->title }}">
              <button>編集</button>
            </form>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" >
              @csrf
              <input type="submit" value="削除" onclick='return confirm("本当に削除しますか?");'>
            </form>
          @endif
        </li>
      @endforeach
    </ul>
    <canvas id="time_log_chart"></canvas>
  </div>
  @if (Route::currentRouteName() === "tasks.index")
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script>
      let chart_task_id_arr = [];
      @foreach ($tasks as $task)
        chart_task_id_arr.push({{ $task->id }});
      @endforeach
      let chart_labels = JSON.parse('<?php echo json_encode($chart_labels, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>');
      let chart_datasets_label_arr = JSON.parse('<?php echo json_encode($chart_datasets_label_arr, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>');
      let chart_datasets_data_arr = JSON.parse('<?php echo json_encode($chart_datasets_data_arr, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>')
    </script>
    <script src="{{ asset('/js/time_log_chart.js?f2d2') }}"></script>
  @endif
  <script src="{{ asset('/js/index.js') }}"></script>
</body>
</html>