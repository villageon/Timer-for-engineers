//フラッシュメッセージ用
let flash = document.getElementById("flash");

//タイマー用
let minutes;
let seconds;
let running = false;
let timeUp = false;
let comment = false;
let display = document.getElementById("display");

let start = document.getElementById("timer-start");
let startWarning = document.getElementById("timer-start-warning");
let startDanger = document.getElementById("timer-start-danger");

let stop = document.getElementById("timer-stop");
let stopWarning = document.getElementById("timer-stop-warning");
let stopDanger = document.getElementById("timer-stop-danger");

let reset = document.getElementById("timer-reset");
let resetWarning = document.getElementById("timer-reset-warning");
let resetDanger = document.getElementById("timer-reset-danger");

let complete = document.getElementById("timer-complete");
let completeWarning = document.getElementById("timer-complete-warning");
let completeDanger = document.getElementById("timer-complete-danger");

let LoseCommentForm = document.getElementById("lose-comment-form");
let WinCommentForm = document.getElementById("win-comment-form");

// メール送信用
let MenterWinCheckbox = document.getElementById("menter_win_checkbox");
let MenterLoseCheckbox = document.getElementById("menter_lose_checkbox");
let MenterWinForm = document.getElementById("menter_win_form");
let MenterLoseForm = document.getElementById("menter_lose_form");

//残り時間によるレイアウト変化用
let Timer = document.getElementById("timer");
let WarningTimer = document.getElementById("warning-timer");
let DangerTimer = document.getElementById("danger-timer");

let Title = document.getElementById("title");
let WarningTitle = document.getElementById("warning-title");
let DangerTitle = document.getElementById("danger-title");

let Nav = document.getElementById("nav");
let NavWarning = document.getElementById("navWarning");
let NavDanger = document.getElementById("navDanger");

//残り時間によるボタンのレイアウト変化
let WinnerSubmit = document.getElementById("winner-submit");
let WinnerSubmitWarning = document.getElementById("winner-submit-warning");
let WinnerSubmitDanger = document.getElementById("winner-submit-danger");

let LoserSubmit = document.getElementById("loser-submit");
let LoserSubmitWarning = document.getElementById("loser-submit-warning");
let LoserSubmitDanger = document.getElementById("loser-submit-danger");

//残り時間によるロゴ変化
let Logo = document.getElementById("logo");
let WarningLogo = document.getElementById("warning-logo");
let DangerLogo = document.getElementById("danger-logo");

function resetTime() {
    minutes = 05;
    seconds = 10;
}

function displayTime() {
    display.textContent = `${("0" + minutes).slice(-2)}:${("0" + seconds).slice(
        -2
    )}`;
}

function countDown() {
    setTimeout(() => {
        if (!running) {
            return;
        } else if (seconds > 0) {
            seconds--;
            displayTime();
        } else if (seconds === 0) {
            if (minutes > 0) {
                minutes--;
                seconds = 59;

                //5分を切った時
                if (minutes < 5) {
                    WarningTimer.classList.remove("hidden");
                    Timer.classList.add("hidden");
                    WarningTitle.classList.remove("hidden");
                    Title.classList.add("hidden");

                    display.classList.remove("text-green-800");
                    display.classList.add("text-yellow-800");

                    Nav.classList.add("hidden");
                    NavWarning.classList.remove("hidden");

                    start.classList.add("hidden");
                    startWarning.classList.remove("hidden");
                    stop.classList.add("hidden");
                    stopWarning.classList.remove("hidden");
                    reset.classList.add("hidden");
                    resetWarning.classList.remove("hidden");
                    complete.classList.add("hidden");
                    completeWarning.classList.remove("hidden");

                    WinnerSubmit.classList.add("hidden");
                    WinnerSubmitWarning.classList.remove("hidden");
                    
                    LoserSubmit.classList.add("hidden");
                    LoserSubmitWarning.classList.remove("hidden");

                    //1分を切った時
                    if (minutes < 4) {
                        DangerTimer.classList.remove("hidden");
                        WarningTimer.classList.add("hidden");

                        DangerTitle.classList.remove("hidden");
                        WarningTitle.classList.add("hidden");

                        display.classList.remove("text-yellow-800");
                        display.classList.add("text-red-800");

                        NavWarning.classList.add("hidden");
                        NavDanger.classList.remove("hidden");

                        startWarning.classList.add("hidden");
                        startDanger.classList.remove("hidden");
                        stopWarning.classList.add("hidden");
                        stopDanger.classList.remove("hidden");
                        resetWarning.classList.add("hidden");
                        resetDanger.classList.remove("hidden");
                        completeWarning.classList.add("hidden");
                        completeDanger.classList.remove("hidden");

                        WinnerSubmitWarning.classList.add("hidden");
                        WinnerSubmitDanger.classList.remove("hidden");
                        
                        LoserSubmitWarning.classList.add("hidden");
                        LoserSubmitDanger.classList.remove("hidden");
                    }
                }
                displayTime();
            } else if (minutes === 0) {
                stopped = true;
                timeUp = true;
                running = false;
                comment = true;

                start.classList.add("inactive");
                startWarning.classList.add("inactive");
                startDanger.classList.add("inactive");

                stop.classList.add("inactive");
                stopWarning.classList.add("inactive");
                stopDanger.classList.add("inactive");
                
                reset.classList.add("inactive");
                resetWarning.classList.add("inactive");
                resetDanger.classList.add("inactive");
                
                complete.classList.add("inactive");
                completeWarning.classList.add("inactive");
                completeDanger.classList.add("inactive");
                
                LoseCommentForm.classList.remove("hidden");

                DangerTitle.classList.add("hidden");
                display.textContent = "敗北";
            }
        }
        countDown();
    }, 1000);
}

start.addEventListener("click", () => {
    if (comment) {
        return;
    }
    if (running) {
        return;
    } else if (timeUp) {
        return;
    } else {
        running = true;

        start.classList.add("inactive");
        startWarning.classList.add("inactive");
        startDanger.classList.add("inactive");

        stop.classList.remove("inactive");
        stopWarning.classList.remove("inactive");
        stopDanger.classList.remove("inactive");
        
        reset.classList.add("inactive");
        resetWarning.classList.add("inactive");
        resetDanger.classList.add("inactive");
        
        complete.classList.remove("inactive");
        completeWarning.classList.remove("inactive");
        completeDanger.classList.remove("inactive");
        
        countDown();
    }
});
startWarning.addEventListener("click", () => {
    if (comment) {
        return;
    }
    if (running) {
        return;
    } else if (timeUp) {
        return;
    } else {
        running = true;

        start.classList.add("inactive");
        startWarning.classList.add("inactive");
        startDanger.classList.add("inactive");

        stop.classList.remove("inactive");
        stopWarning.classList.remove("inactive");
        stopDanger.classList.remove("inactive");
        
        reset.classList.add("inactive");
        resetWarning.classList.add("inactive");
        resetDanger.classList.add("inactive");
        
        complete.classList.remove("inactive");
        completeWarning.classList.remove("inactive");
        completeDanger.classList.remove("inactive");
        
        countDown();
    }
});
startDanger.addEventListener("click", () => {
    if (comment) {
        return;
    }
    if (running) {
        return;
    } else if (timeUp) {
        return;
    } else {
        running = true;

        start.classList.add("inactive");
        startWarning.classList.add("inactive");
        startDanger.classList.add("inactive");

        stop.classList.remove("inactive");
        stopWarning.classList.remove("inactive");
        stopDanger.classList.remove("inactive");
        
        reset.classList.add("inactive");
        resetWarning.classList.add("inactive");
        resetDanger.classList.add("inactive");
        
        complete.classList.remove("inactive");
        completeWarning.classList.remove("inactive");
        completeDanger.classList.remove("inactive");
        
        countDown();
    }
});

stop.addEventListener("click", () => {
    if (comment) {
        return;
    }
    if (running) {
        running = false;
        stop.classList.add("inactive");
        stopWarning.classList.add("inactive");
        stopDanger.classList.add("inactive");
        
        start.classList.remove("inactive");
        startWarning.classList.remove("inactive");
        startDanger.classList.remove("inactive");
        
        reset.classList.remove("inactive");
        resetWarning.classList.remove("inactive");
        resetDanger.classList.remove("inactive");
        
        complete.classList.add("inactive");
        completeWarning.classList.add("inactive");
        completeDanger.classList.add("inactive");
    } else {
        return;
    }
});
stopWarning.addEventListener("click", () => {
    if (comment) {
        return;
    }
    if (running) {
        running = false;
        stop.classList.add("inactive");
        stopWarning.classList.add("inactive");
        stopDanger.classList.add("inactive");
        
        start.classList.remove("inactive");
        startWarning.classList.remove("inactive");
        startDanger.classList.remove("inactive");
        
        reset.classList.remove("inactive");
        resetWarning.classList.remove("inactive");
        resetDanger.classList.remove("inactive");
        
        complete.classList.add("inactive");
        completeWarning.classList.add("inactive");
        completeDanger.classList.add("inactive");
    } else {
        return;
    }
});
stopDanger.addEventListener("click", () => {
    if (comment) {
        return;
    }
    if (running) {
        running = false;
        stop.classList.add("inactive");
        stopWarning.classList.add("inactive");
        stopDanger.classList.add("inactive");
        
        start.classList.remove("inactive");
        startWarning.classList.remove("inactive");
        startDanger.classList.remove("inactive");
        
        reset.classList.remove("inactive");
        resetWarning.classList.remove("inactive");
        resetDanger.classList.remove("inactive");
        
        complete.classList.add("inactive");
        completeWarning.classList.add("inactive");
        completeDanger.classList.add("inactive");
    } else {
        return;
    }
});

reset.addEventListener("click", () => {
    if (comment) {
        return;
    }
    if (running) {
        return;
    }
    resetTime();
    displayTime();
    timeUp = false;

    Timer.classList.remove("hidden");
    WarningTimer.classList.add("hidden");
    DangerTimer.classList.add("hidden");

    Title.classList.remove("hidden");
    WarningTitle.classList.add("hidden");
    DangerTitle.classList.add("hidden");

    display.classList.remove("text-yellow-800");
    display.classList.remove("text-red-800");
    display.classList.add("text-green-800");

    Nav.classList.remove("hidden");
    NavWarning.classList.add("hidden");
    NavDanger.classList.add("hidden");

    start.classList.remove("hidden");
    startWarning.classList.add("hidden");
    startDanger.classList.add("hidden");

    stop.classList.remove("hidden");
    stopWarning.classList.add("hidden");
    stopDanger.classList.add("hidden");

    reset.classList.remove("hidden");
    resetWarning.classList.add("hidden");
    resetDanger.classList.add("hidden");

    complete.classList.remove("hidden");
    completeDanger.classList.add("hidden");
    completeWarning.classList.add("hidden");

    WinnerSubmit.classList.remove("hidden");
    WinnerSubmitWarning.classList.add("hidden");
    WinnerSubmitDanger.classList.add("hidden");
    
    LoserSubmit.classList.remove("hidden");
    LoserSubmitWarning.classList.add("hidden");
    LoserSubmitDanger.classList.add("hidden");

    start.classList.remove("inactive");
    reset.classList.add("inactive");
});
resetWarning.addEventListener("click", () => {
    if (comment) {
        return;
    }
    if (running) {
        return;
    }
    resetTime();
    displayTime();
    timeUp = false;

    Timer.classList.remove("hidden");
    WarningTimer.classList.add("hidden");
    DangerTimer.classList.add("hidden");

    Title.classList.remove("hidden");
    WarningTitle.classList.add("hidden");
    DangerTitle.classList.add("hidden");

    display.classList.remove("text-yellow-800");
    display.classList.remove("text-red-800");
    display.classList.add("text-green-800");

    Nav.classList.remove("hidden");
    NavWarning.classList.add("hidden");
    NavDanger.classList.add("hidden");

    start.classList.remove("hidden");
    startWarning.classList.add("hidden");
    startDanger.classList.add("hidden");

    stop.classList.remove("hidden");
    stopWarning.classList.add("hidden");
    stopDanger.classList.add("hidden");

    reset.classList.remove("hidden");
    resetWarning.classList.add("hidden");
    resetDanger.classList.add("hidden");

    complete.classList.remove("hidden");
    completeDanger.classList.add("hidden");
    completeWarning.classList.add("hidden");

    WinnerSubmit.classList.remove("hidden");
    WinnerSubmitWarning.classList.add("hidden");
    WinnerSubmitDanger.classList.add("hidden");
    
    LoserSubmit.classList.remove("hidden");
    LoserSubmitWarning.classList.add("hidden");
    LoserSubmitDanger.classList.add("hidden");

    start.classList.remove("inactive");
    reset.classList.add("inactive");
});
resetDanger.addEventListener("click", () => {
    if (comment) {
        return;
    }
    if (running) {
        return;
    }
    resetTime();
    displayTime();
    timeUp = false;

    Timer.classList.remove("hidden");
    WarningTimer.classList.add("hidden");
    DangerTimer.classList.add("hidden");

    Title.classList.remove("hidden");
    WarningTitle.classList.add("hidden");
    DangerTitle.classList.add("hidden");

    display.classList.remove("text-yellow-800");
    display.classList.remove("text-red-800");
    display.classList.add("text-green-800");

    Nav.classList.remove("hidden");
    NavWarning.classList.add("hidden");
    NavDanger.classList.add("hidden");

    start.classList.remove("hidden");
    startWarning.classList.add("hidden");
    startDanger.classList.add("hidden");

    stop.classList.remove("hidden");
    stopWarning.classList.add("hidden");
    stopDanger.classList.add("hidden");

    reset.classList.remove("hidden");
    resetWarning.classList.add("hidden");
    resetDanger.classList.add("hidden");

    complete.classList.remove("hidden");
    completeDanger.classList.add("hidden");
    completeWarning.classList.add("hidden");

    WinnerSubmit.classList.remove("hidden");
    WinnerSubmitWarning.classList.add("hidden");
    WinnerSubmitDanger.classList.add("hidden");
    
    LoserSubmit.classList.remove("hidden");
    LoserSubmitWarning.classList.add("hidden");
    LoserSubmitDanger.classList.add("hidden");

    start.classList.remove("inactive");
    reset.classList.add("inactive");
});

complete.addEventListener("click", () => {
    if (comment) {
        return;
    }
    if (!running) {
        return;
    }
    resetTime();
    displayTime();

    start.classList.add("inactive");
    startWarning.classList.add("inactive");
    startDanger.classList.add("inactive");
    
    stop.classList.add("inactive");
    stopWarning.classList.add("inactive");
    stopDanger.classList.add("inactive");
    
    reset.classList.add("inactive");
    resetWarning.classList.add("inactive");
    resetDanger.classList.add("inactive");
    
    complete.classList.add("inactive");
    completeWarning.classList.add("inactive");
    completeDanger.classList.add("inactive");

    WinCommentForm.classList.remove("hidden");

    stopped = true;
    timeUp = true;
    running = false;
    comment = true;
    display.textContent = "勝利";
});
completeWarning.addEventListener("click", () => {
    if (comment) {
        return;
    }
    if (!running) {
        return;
    }
    resetTime();
    displayTime();

    start.classList.add("inactive");
    startWarning.classList.add("inactive");
    startDanger.classList.add("inactive");
    
    stop.classList.add("inactive");
    stopWarning.classList.add("inactive");
    stopDanger.classList.add("inactive");
    
    reset.classList.add("inactive");
    resetWarning.classList.add("inactive");
    resetDanger.classList.add("inactive");
    
    complete.classList.add("inactive");
    completeWarning.classList.add("inactive");
    completeDanger.classList.add("inactive");

    WinCommentForm.classList.remove("hidden");

    stopped = true;
    timeUp = true;
    running = false;
    comment = true;
    display.textContent = "勝利";
});
completeDanger.addEventListener("click", () => {
    if (comment) {
        return;
    }
    if (!running) {
        return;
    }
    resetTime();
    displayTime();

    start.classList.add("inactive");
    startWarning.classList.add("inactive");
    startDanger.classList.add("inactive");
    
    stop.classList.add("inactive");
    stopWarning.classList.add("inactive");
    stopDanger.classList.add("inactive");
    
    reset.classList.add("inactive");
    resetWarning.classList.add("inactive");
    resetDanger.classList.add("inactive");
    
    complete.classList.add("inactive");
    completeWarning.classList.add("inactive");
    completeDanger.classList.add("inactive");

    WinCommentForm.classList.remove("hidden");

    stopped = true;
    timeUp = true;
    running = false;
    comment = true;
    display.textContent = "勝利";
});

MenterLoseCheckbox.addEventListener("change", function () {
    if (this.checked == true) {
        MenterLoseForm.classList.remove("hidden");
    } else if (this.checked == false) {
        MenterLoseForm.classList.add("hidden");
    }
});

MenterWinCheckbox.addEventListener("change", function () {
    if (this.checked == true) {
        MenterWinForm.classList.remove("hidden");
    } else if (this.checked == false) {
        MenterWinForm.classList.add("hidden");
    }
});

setTimeout(function(){
    flash.classList.add("hidden");
}, 5000);
resetTime();
displayTime();
