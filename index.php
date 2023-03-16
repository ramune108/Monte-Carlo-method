<!DOCTYPE html>
<html>
  <head>
    <title>モンティ・カルロ法による円周率の計算</title>
    <style>
      #canvas {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
    </style>
  </head>
  <body>
    <h1>モンティ・カルロ法による円周率の計算</h1>
    <canvas id="canvas"></canvas>
    <button onclick="start()">計算開始</button>
    <p id="result"></p>

    <script>
      function start() {
        const canvas = document.getElementById("canvas");
        const width = 500;
        const height = 500;
        const context = canvas.getContext("2d");
        canvas.width = width;
        canvas.height = height;
        context.fillStyle = "#FFFFFF";
        context.fillRect(0, 0, width, height);
        context.strokeStyle = "#000000";
        context.beginPath();
        context.arc(width / 2, height / 2, width / 2, 0, 2 * Math.PI);
        context.stroke();

        let count = 0;
        let total = 0;
        const n = 1000000;
        for (let i = 0; i < n; i++) {
          const x = Math.random() * width;
          const y = Math.random() * height;
          const dx = x - width / 2;
          const dy = y - height / 2;
          if (dx * dx + dy * dy < (width / 2) * (width / 2)) {
            context.fillStyle = "#000000";
            count++;
          } else {
            context.fillStyle = "#FF0000";
          }
          context.beginPath();
          context.arc(x, y, 1, 0, 2 * Math.PI);
          context.fill();
          total++;
        }

        const pi = (4 * count) / total;
        document.getElementById("result").textContent = `π ≈ ${pi}`;
      }
    </script>
  </body>
</html>
