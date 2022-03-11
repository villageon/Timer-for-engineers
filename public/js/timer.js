//タイマー用
let minutes
let seconds
let running = false
let timeUp = false
let comment = false
let display = document.getElementById("display")
let start = document.getElementById("timer-start")
let stop = document.getElementById("timer-stop")
let reset = document.getElementById("timer-reset")
let complete = document.getElementById("timer-complete")

let LoseCommentForm = document.getElementById("lose-comment-form")
let WinCommentForm = document.getElementById("win-comment-form")

// メール送信用
let MenterWinCheckbox = document.getElementById("menter_win_checkbox")
let MenterLoseCheckbox = document.getElementById("menter_lose_checkbox")
let MenterWinForm = document.getElementById("menter_win_form")
let MenterLoseForm = document.getElementById("menter_lose_form")

//残り時間によるレイアウト変化用
let Timer = document.getElementById("timer")
let WarningTimer = document.getElementById("warning-timer")
let DangerTimer = document.getElementById("danger-timer")
let Title = document.getElementById("title")
let WarningTitle = document.getElementById("warning-title")
let DangerTitle = document.getElementById("danger-title")
let Nav = document.getElementById("nav")

//残り時間によるボタンのレイアウト変化
let WinnerSubmit = document.getElementById("winner-submit")
let LoserSubmit = document.getElementById("loser-submit")

//残り時間によるロゴ変化
let Logo = document.getElementById("logo")
let WarningLogo = document.getElementById("warning-logo")
let DangerLogo = document.getElementById("danger-logo")


function resetTime() {
    minutes = 05
    seconds = 10
}

function displayTime() {
    display.textContent = `${("0" + minutes).slice(-2)}:${("0" + seconds).slice(-2)}`
}

function countDown() {
    setTimeout(() => {
        if (!running) {
            return
        } else if (seconds > 0) {
            seconds--
            displayTime()
        } else if (seconds === 0) {
            if (minutes > 0) {
                minutes--
                seconds = 59

                //5分を切った時
                if (minutes < 5) {
                    Timer.classList.add("hidden")
                    WarningTimer.classList.remove("hidden")
                    Title.classList.add("hidden")
                    WarningTitle.classList.remove("hidden")
                    display.classList.add("text-yellow-800")
                    Nav.classList.remove("bg-gradient-to-r", "from-teal-600", "via-teal-400", "to-teal-200")
                    Nav.classList.add("bg-gradient-to-r", "from-yellow-600", "via-yellow-400",
                        "to-yellow-200")

                    start.classList.remove("bg-green-500", "hover:bg-green-600")
                    start.classList.add("bg-yellow-500", "hover:bg-yellow-600")
                    stop.classList.remove("bg-green-500", "hover:bg-green-600")
                    stop.classList.add("bg-yellow-500", "hover:bg-yellow-600")
                    reset.classList.remove("bg-green-500", "hover:bg-green-600")
                    reset.classList.add("bg-yellow-500", "hover:bg-yellow-600")
                    complete.classList.remove("bg-green-500", "hover:bg-green-600")
                    complete.classList.add("bg-yellow-500", "hover:bg-yellow-600")

                    WinnerSubmit.classList.remove("bg-green-700", "hover:bg-green-800")
                    WinnerSubmit.classList.add("bg-yellow-700", "hover:bg-yellow-800")


                    //1分を切った時
                    if (minutes < 4) {
                        WarningTimer.classList.add("hidden")
                        DangerTimer.classList.remove("hidden")
                        WarningTitle.classList.add("hidden")
                        DangerTitle.classList.remove("hidden")
                        display.classList.remove("text-yellow-800")
                        display.classList.add("text-red-800")
                        Nav.classList.remove("bg-gradient-to-r", "from-yellow-600", "via-yellow-400",
                            "to-yellow-200")
                        Nav.classList.add("bg-gradient-to-r", "from-red-600", "via-red-400", "to-red-200")

                        start.classList.remove("bg-yellow-500", "hover:bg-yellow-600")
                        start.classList.add("bg-red-500", "hover:bg-red-600")
                        stop.classList.remove("bg-yellow-500", "hover:bg-yellow-600")
                        stop.classList.add("bg-red-500", "hover:bg-red-600")
                        reset.classList.remove("bg-yellow-500", "hover:bg-yellow-600")
                        reset.classList.add("bg-red-500", "hover:bg-red-600")
                        complete.classList.remove("bg-yellow-500", "hover:bg-yellow-600")
                        complete.classList.add("bg-red-500", "hover:bg-red-600")

                        WinnerSubmit.classList.remove("bg-yellow-700", "hover:bg-yellow-800")
                        WinnerSubmit.classList.add("bg-red-700", "hover:bg-red-800")

                    }
                }
                displayTime()
            } else if (minutes === 0) {
                stopped = true
                timeUp = true
                running = false
                comment = true

                start.classList.add("inactive")
                stop.classList.add("inactive")
                reset.classList.add("inactive")
                complete.classList.add("inactive")
                LoseCommentForm.classList.remove("hidden")

                DangerTitle.classList.add("hidden")
                display.textContent = "敗北"
            }
        }
        countDown()
    }, 1000)
}

start.addEventListener("click", () => {
    if (comment) {
        return
    }
    if (running) {
        return
    } else if (timeUp) {
        return
    } else {
        running = true
        start.classList.add("inactive")
        stop.classList.remove("inactive")
        reset.classList.add("inactive")
        complete.classList.remove("inactive")
        countDown()
    }
})

stop.addEventListener("click", () => {
    if (comment) {
        return
    }
    if (running) {
        running = false
        stop.classList.add("inactive")
        start.classList.remove("inactive")
        reset.classList.remove("inactive")
        complete.classList.add("inactive")
    } else {
        return
    }
})

reset.addEventListener("click", () => {
    if (comment) {
        return
    }
    if (running) {
        return
    }
    resetTime()
    displayTime()
    timeUp = false
    start.classList.remove("inactive")
    reset.classList.add("inactive")
})

complete.addEventListener("click", () => {
    if (comment) {
        return
    }
    if (!running) {
        return
    }
    resetTime()
    displayTime()
    start.classList.add("inactive")
    stop.classList.add("inactive")
    reset.classList.add("inactive")
    complete.classList.add("inactive")

    WinCommentForm.classList.remove("hidden")

    stopped = true
    timeUp = true
    running = false
    comment = true
    display.textContent = "勝利"
})

MenterLoseCheckbox.addEventListener('change', function() {
    if (this.checked == true) {
        MenterLoseForm.classList.remove("hidden")
    } else if (this.checked == false) {
        MenterLoseForm.classList.add("hidden")
    }
})

MenterWinCheckbox.addEventListener('change', function() {
    if (this.checked == true) {
        MenterWinForm.classList.remove("hidden")
    } else if (this.checked == false) {
        MenterWinForm.classList.add("hidden")
    }
})

resetTime()
displayTime()