<!doctype html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>回收箱交互页面</title>
    <style>
        :root {
            --accent: #4C7D3C;
            --dark-bg: rgba(0,0,0,0.5);
            --radius: 16px;
        }
        * {
            box-sizing: border-box;
        }
        body {
			
			 
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f3f8f4;
            color: #0f172a;
            display: flex;
            margin-top:400px;
            flex-direction: column;
            height: 50vh;
			 
 
 
        }
        .wrap {
            display: flex;
            flex: 1;
        }
		
		   .top  {
			   margin-top:-422px;
			   height:350px;
			   absolute:position;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            font-weight: 300;
            cursor: pointer;
            transition: all .3s;
            color: white;
            border: none;
			 background: linear-gradient(135deg, #4C7D3C, #4C7D3C);
			
			
        }
		
		.close-x-btn {
    position: absolute;
    top: 15px;
    right: 20px;
    background: #ef4444;  /* 醒目的红色 */
    color: white;
    border: none;
    font-size: 28px;
    font-weight: bold;
    width: 45px;
    height: 45px;
    border-radius: 50%;  /* 圆形 */
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    z-index: 10;
}

/* 悬停效果 */
.close-x-btn:hover {
    background: #dc2626;  /* 更深红色 */
    transform: scale(1.1);  /* 放大一点 */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
}

/* 点击效果 */
.close-x-btn:active {
    transform: scale(0.95);
}
		
        .btn-box {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 700;
            cursor: pointer;
            transition: all .3s;
            color: white;
            border: none;
        }
		
		
        .left {
            flex: 0 0 60%;
            background: linear-gradient(135deg, #4C7D3C, #4C7D3C);
        }
        .right {
            flex: 0 0 40%;
            background: linear-gradient(135deg, #4C7D3C, #4C7D3C);
        }
        .btn-box:hover {
            filter: brightness(1.1);
        }
        /* 弹窗 */
        .overlay {
            position: fixed;
            inset: 0;
            background: var(--dark-bg);
            display: none;
            align-items: center;
            justify-content: center;
            	
			margin-left:65px;
			margin-top:-600px;
        }
        .overlay.active {
            display: flex;
        }
        .input-modal {
			  position: relative;
            background: white;
            border-radius: var(--radius);
            padding: 40px;
            min-width: 720px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
            text-align: center;
        }
        .input-modal h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 1.4rem;
        }
        .input-modal input {
            width: 100%;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 1.2rem;
			
        }
        .close-btn {
            margin-top: 40px;
            padding: 30px 28px;
            border-radius: 8px;
            background: var(--accent);
            color: white;
            border: none;
            cursor: pointer;
            font-size: 30px;
			
        }
        /* 底部显示条 */
        .bottom-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #ffffff;
            border-top: 1px solid #d1d5db;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 200px;
            top:1770px;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
        }
        .bottom-text {
            flex: 1;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #374151;
            font-size: 2rem;
        }
        .bottom-actions button {
            margin-left: 10px;
            padding: 8px 14px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            font-size: 2rem;
        }
     .reset-btn {
    margin-top: 40px;
    padding: 30px 28px;
    border-radius: 8px;
    background: #fff;  /* 改成灰色 */
    color: #000;
        border: 1px solid #000;  /* 黑框 1px */
    cursor: pointer;
    font-size: 30px;
    transition: all 0.2s ease;  /* 新增：平滑过渡 */
}
.btn-box.disabled {
    background: #9ca3af !important;
    cursor: not-allowed !important;
    opacity: 0.6;
    pointer-events: none;  /* 禁止点击 */
}


/* 悬停效果 */
.reset-btn:hover {
    background: #4b5563;  /* 深灰色 */
}

/* 点击效果 */
.reset-btn:active {
    background: #374151;  /* 更深灰色 */
    transform: scale(0.98);
}
        .confirm-btn {
            background: var(--accent);
            color: white;
			
        }
		
	.back-button {
    position: absolute;
    left: 40.2%;
    top: 80%;
    transform: translateY(-50%);
    background: linear-gradient(135deg, #4C7D3C, #4C7D3C);
    color: white;
    border: none;
    padding: 32px 24px;
    border-radius: 50px;
    font-size: 20px;
    font-weight: 600;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(46, 204, 113, 0.3);
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.back-button:hover {
    background: linear-gradient(135deg, rgba(46, 204, 113, 0.9), rgba(39, 174, 96, 0.9));
    box-shadow: 0 6px 20px rgba(46, 204, 113, 0.5);
    transform: translateY(-50%) scale(1.05);
}
        .back-button:active {
            transform: translateY(-50%) scale(0.98);
        }
        
        .back-button i {
            font-size:48px;
        }
		
		
		
    </style>
</head>
<body>
<?php 

include("IncDB.php");
  

$sql = "update command set userscan=0";
 mysqli_query($link, $sql);
 


?>


 <img src='img/logo.jpg' width='210px' style='position:absolute;top:20px'>
<div class="wrap">
    <div class="top">Tryb wymiany worka w urządzenia</div>
</div>

<div style='margin-top:300px; left: 20%;top:15%; position:absolute;font-size:30px;color:black;font-family:bold'>Wybierz kosz w którym chcesz wymienić worek:</div>
<div class="wrap">
    <div class="btn-box left" id="leftBtn" style='text-align:center'>LEWY KOSZ <br>(Butelki PET)</div>
  


  <div class="btn-box right" id="rightBtn" style='text-align:center'>PRAWY KOSZ <br>(Puszki)</div>
	
	
	
</div>

 

<form id="bottomForm" action="submit.php" method="get" onsubmit="return validateForm();">
    <div class="overlay" id="overlay">
        <div class="input-modal" id="modal">
            <!-- 添加 X 关闭按钮 -->
            <button type="button" class="close-x-btn" onclick="closeModal();">&times;</button>
            
            <h2 id="modalTitle" style='font-size:40px'>Wprowadź treść</h2>
            <input type="text" id="inputField" name="bin_barcode" placeholder="Zeskanowana plomba:"> 
            <button type="button" class="reset-btn" onclick="document.getElementById('inputField').value = '';">wyczyść</button>
            <button type="submit" class="close-btn">zaakceptuj number plomby</button> 
        </div>
    </div>
</form>



<script>
function validateForm() {
    const inputField = document.getElementById('inputField');
    // 优先使用用户输入的值，如果没有则使用 placeholder
    let value = inputField.value.trim();
    if (value === '') {
        value = inputField.placeholder.trim();
    }
    
    if (value === '' || value === 'Zeskanuj plombę przykładając ją do skanera po prawej stronie.' || value === 'wrong') {
        alert('Brak danych do wysłania!');  // 没有数据可发送
        return false;
    }
    
    // 可选：将最终值赋给 input field
    inputField.value = value;
    return true;
}
</script>


<button class="back-button" style=' ' onclick="window.location.href='http://127.0.0.1/tjt/debug/'">
    ← Powrót do ekranu serwisowego
</button>

<!-- 添加一个隐藏的或可见的 bottomText 元素，如果不需要可以删除相关代码 -->
<div id="bottomText" style="display:none;"></div>

<script src="js/jquery-1.9.1.min.js"></script>
<script>
const bottomForm = document.getElementById('bottomForm');
const bottomTextValue = document.getElementById('bottomTextValue');

// 如果 bottomTextValue 不存在，跳过这个事件监听
if (bottomForm && bottomTextValue) {
    bottomForm.addEventListener('submit', function() {
        bottomTextValue.value = bottomText.textContent.trim();
    });
}

const overlay = document.getElementById('overlay');
const modalTitle = document.getElementById('modalTitle');
const inputField = document.getElementById('inputField');
const leftBtn = document.getElementById('leftBtn');
const rightBtn = document.getElementById('rightBtn');
const closeBtn = document.getElementById('closeBtn');
const bottomText = document.getElementById('bottomText'); 
let currentBin = '';
let pollingInterval = null;

// ✅ 添加 stopPolling 函数
function stopPolling() {
    if (pollingInterval) {
        clearInterval(pollingInterval);
        pollingInterval = null;
    }
}

// ✅ 打开 modal，并启动轮询
function openModal(bin) {
    currentBin = bin;
    modalTitle.textContent = bin === 'left' ? 'Lewy kosz' : 'Prawy kosz';
    inputField.value = '';
    overlay.classList.add('active');
    startPolling();
}

// ✅ 关闭 modal，并停止轮询
function closeModal() {
    const val = inputField.value.trim() || inputField.placeholder;
    if (bottomText) {
        bottomText.textContent = `${currentBin === 'left' ? 'l' : 'r'} ${val}`;
    }
    overlay.classList.remove('active');
    stopPolling();
}

// ✅ 轮询 data.php
function startPolling() {
    if (pollingInterval) clearInterval(pollingInterval);

    function poll() {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "data.php",
            timeout: 8000,
            data: { time: "5000" },
            success: function(data) {
                if (data.success == "1") {
                    const prefix = currentBin === 'left' ? 'l' : 'r';
                    inputField.placeholder = prefix + (data.msg || data.value);
                    
                    if (bottomText && !overlay.classList.contains('active')) {
                        bottomText.textContent = `最新数据: ${data.msg}`;
                    }
                } else {
                    inputField.placeholder = "Zeskanuj plombę przykładając ją do skanera po prawej stronie.";
                }
            },
            error: function() {
                inputField.placeholder = "wrong";
            }
        });
    }

    poll();
    pollingInterval = setInterval(poll, 3000);
}

// ✅ 事件绑定
if (leftBtn) {
    leftBtn.addEventListener('click', () => openModal('left'));
}

if (rightBtn) {
    rightBtn.addEventListener('click', (e) => {
        // 如果按钮有 disabled 类，阻止点击
        if (rightBtn.classList.contains('disabled')) {
            e.preventDefault();
            return false;
        }
        openModal('right');
    });
}

if (closeBtn) closeBtn.addEventListener('click', closeModal);
if (overlay) {
    overlay.addEventListener('click', (e) => {
        if (e.target === overlay) closeModal();
    });
}


 
</script>

<script>
// 读取 storagebox.txt 并判断右边按钮状态
function checkRightButtonStatus() {
    const rightBtn = document.getElementById('rightBtn');
    if (!rightBtn) return;
    
    $.ajax({
        type: "GET",
        url: "../../storagebox.txt",
        dataType: "text",
        cache: false,
        success: function(data) {
            const content = data.trim();
            if (content === "1") {
                rightBtn.classList.add('disabled');
                console.log("右边按钮已禁用 (storagebox.txt = 1)");
            } else if (content === "2") {
                rightBtn.classList.remove('disabled');
                console.log("右边按钮已启用 (storagebox.txt = 2)");
            } else {
                rightBtn.classList.remove('disabled');
                console.log("右边按钮已启用 (默认)");
            }
        },
        error: function() {
            rightBtn.classList.remove('disabled');
            console.log("无法读取 storagebox.txt，默认启用按钮");
        }
    });
}

// 页面加载完成后检查
$(document).ready(function() {
    checkRightButtonStatus();
});

// 每3秒检查一次文件变化
setInterval(checkRightButtonStatus, 3000);
</script>


<script>
    // 延迟 120 秒后跳转
    setTimeout(() => {
        window.location.href = "http://127.0.0.1";
    }, 120000);
</script>
	
</body>
</html>