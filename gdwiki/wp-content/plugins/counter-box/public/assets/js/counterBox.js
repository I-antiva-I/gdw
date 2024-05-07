'use strict';

const counterBox = function (selector, options) {

    // let counterBox = {};

    // Default settings
    let _default = {
        container_css: '',// Style for container
        number_css: '', // Style for numbers
        type: 'CountToDate', // CountToDate, ContFromDate, CountToWeekday, Timer, UserTimer, Counter
        date_options: {
            date: '2025-05-15', // Date like 2020-05-15, Can be: Everyday, Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday
            time: '23:59:59', // Time: hours:minutes:seconds
            timezone: '+00:00', // time zone designator (+hh:mm or -hh:mm)
        },
        timer_options: {
            day: '0',
            hours: '0',
            minutes: '100',
            seconds: '10',
        },
        counter_options: {
            start: 1, // initial number for counter
            finish: 5, // initial number for counter
            speed: {min: 1, max: 1}, // min & max speed for counter in seconds
            increment: {min: 1, max: 1}, // min & max increment of number for the counter
            round: 2, // rounding the number. set decimals
            delimiter: 1, // delimiter of a numbers
            remember: 0, // remember number for user

        },
        targets: {},
    };


    // let settings = Object.assign(_default, options);
    let settings = _objAssign(_default, options);
    let element = document.querySelector(selector);

    // Helpers

    function _objAssign(target, source) {
        let objs = [target, source];
        return objs.reduce(function (r, o) {
            Object.keys(o).forEach(function (k) {
                r[k] = o[k];
            });
            return r;
        }, {});
    }


    function _log(val) {
        console.log(val);
    }

    function _count(obj) {
        return Object.keys(obj).length;
    }

    function _getDate(options) {
        options = options || false;
        if (options === false) {
            options = settings.date_options;
        }
        return new Date(options.date + 'T' + options.time + options.timezone);
    }

    function _weekdayNumder(arr, val) {
        for (let i = 0; i < arr.length; i++) {
            if (arr[i] === val) {
                return i;
            }
        }
        return false;
    }

    function _getWeekdayDate() {
        let new_date = settings.date_options;
        let daily = new_date.date;
        let date = new Date();
        let current_weekday = date.getDay();
        let weekday = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        let weekday_num = _weekdayNumder(weekday, daily);
        if (daily !== 'Everyday' && weekday_num !== current_weekday) {
            date.setDate(date.getDate() + (weekday_num + 7 - date.getDay()) % 7);
        }
        let year = date.getFullYear();
        let month = ("0" + (date.getMonth() + 1)).slice(-2);
        let day = ("0" + date.getDate()).slice(-2);
        new_date.date = year + '-' + month + '-' + day;
        return _getDate(new_date);
    }

    function _getTimerDate() {
        let options = settings.timer_options;
        let current = (settings.type === 'TimerStopGo') ? 0 : new Date().getTime();
        let days = parseInt(options.day) * 86400000;
        let hours = parseInt(options.hours) * 3600000;
        let minutes = parseInt(options.minutes) * 60000;
        let seconds = parseInt(options.seconds) * 1000;
        let left = current + days + hours + minutes + seconds;
        if(settings.type === 'TimerStopGo') {
            left = left/1000;
        }
        return (left);
    }

    function _getUserTimerDate() {
        let date = localStorage.getItem(selector);
        if (date === null) {
            date = _getTimerDate();
            localStorage.setItem(selector, date.toString());
        }
        return parseInt(date);
    }

    function _updateTimer(left) {
        localStorage.setItem(selector, left.toString());
    }


    function _getCounterNumber() {
        let options = settings.counter_options;
        let userNumber = localStorage.getItem(selector);
        let number;
        if (parseInt(options.remember) === 1 && userNumber !== null) {
            number = userNumber;
        } else {
            number = parseFloat(options.start);
        }
        return parseFloat(number);
    }

    function _decimalNumber(value) {
        return ("0" + value).slice(-2);
    }

    function _setResult(selector, value) {
        if (value < 0) value = 0;
        if (selector !== '.counter-box__day') {
            value = _decimalNumber(value).toString();
        }
        if (element.querySelector(selector)) {
            element.querySelector(selector).innerHTML = value;
        }
    }

    function _goCount(left) {
        let days = Math.floor(left / 86400);
        _setResult('.counter-box__day', days);
        left -= days * 86400;
        let hours = Math.floor(left / 3600);
        _setResult('.counter-box__hour', hours);
        left -= hours * 3600;
        let minutes = Math.floor(left / 60);
        _setResult('.counter-box__min', minutes);
        left -= minutes * 60;
        let seconds = left;
        _setResult('.counter-box__sec', seconds);
    }

    function _goTarget() {

        let targets = settings.targets;

        if (_count(targets) <= 0) return;

        for (let key in targets) {
            switch (key) {
                case 'hideBlock':
                    document.querySelector(targets[key]).style.display = 'none';
                    break;
                case 'showBlock':
                    document.querySelector(targets[key]).style.display = 'block';
                    break;
                case 'redirect':
                    window.location.replace(targets[key]);
                    break;
                case 'hideCounter':
                    if (targets[key] === 1) element.style.display = 'none';
                    break;
                case 'showMessage':
                    element.innerHTML = targets[key];
                    break;
                case 'action':
                    let fn = window[targets[key]];
                    if (typeof fn === 'function') {
                        fn();
                    }
                    break;

            }
        }
    }

    function goCountDown(date) {
        let left;
        let current_date = new Date();
        if (current_date > date) {
            left = 0;
            _goCount(left);
            _goTarget();
            return;
        }
        left = Math.floor((date - current_date) / 1000);
        _goCount(left);
        setTimeout(goCountDown, 1000, date);
    }

    function goTimer(left) {
        if (left < 0) {
            left = 0;
            _goCount(left);
            _goTarget();
            return;
        }
        _goCount(left);
        left = left - 1;
        _updateTimer(left);
        setTimeout(goTimer, 1000, left);
    }

    function goCountUp(date) {
        let current_date = new Date();
        let left;
        left = Math.floor((current_date - date) / 1000);
        _goCount(left);
        setTimeout(goCountUp, 1000, date);
    }


    function _randomInteger(min, max) {
        return parseFloat(min) + Math.random() * (parseFloat(max) - parseFloat(min));
    }

    function _delimiterNumber(number) {
        number += "";
        number = new Array(4 - number.length % 3).join("U") + number;
        return number.replace(/([0-9U]{3})/g, "$1 ").replace(/U/g, "");
    }

    function _numberOutput(number) {
        let options = settings.counter_options;
        number = parseFloat(number);

        let start_number = parseFloat(options.start);
        let start_finish = parseFloat(options.finish);


        let direct = (start_number < start_finish) ? 'up' : 'down';

        let stop = 'no';

        if (direct === 'up' && number > start_finish) {
            number = start_finish;
            stop = 'yes';
        } else if (direct === 'down' && number < start_finish) {
            number = start_finish;
            stop = 'yes';
        }

        let output = number.toFixed(parseInt(options.round));

        if (parseInt(options.delimiter) === 1) {
            output = _delimiterNumber(output);
        }

        if (parseInt(options.remember) === 1) {
            localStorage.setItem(selector, number);
        }

        if (element.querySelector('.counter-box__counter')) {
            element.querySelector('.counter-box__counter').innerHTML = output;
        }

        if (stop === 'yes') {
            _goTarget();
            return false;
        }
        return true;

    }

    function goCounter(number, check) {
        let options = settings.counter_options;

        let speed = _randomInteger(options.speed.min, options.speed.max);
        let amount = _randomInteger(options.increment.min, options.increment.max);

        if (check !== null) {
            number = number + amount;
        } else {
            check = 1;
        }

        if (_numberOutput(number) === true) {
            setTimeout(goCounter, speed * 1000, number, check);
        }
    }


    // Replace tags in content
    function setElements() {
        let content = element.innerHTML;
        content = content.replace("{day}", '<span class="counter-box__day"></span>');
        content = content.replace("{hour}", '<span class="counter-box__hour"></span>');
        content = content.replace("{min}", '<span class="counter-box__min"></span>');
        content = content.replace("{sec}", '<span class="counter-box__sec"></span>');
        content = content.replace("{counter}", '<span class="counter-box__counter"></span>');
        element.innerHTML = content;
    }


    function _forEach(items, callback) {
        // loops through elements of an array
        for (let i = 0; i < items.length; i++) {
            callback && callback(items[i], i);
        }
    }

    // set style for element
    function setStyle() {
        element.style.cssText = settings.container_css;
        let numbers = element.querySelectorAll('[class *= "counter-box__"]');
        _forEach(numbers, function (number) {
            number.style.cssText = settings.number_css;
        });
    }

    function startCount() {
        let type = settings.type;
        let date;
        switch (type) {
            case 'CountToDate':
                date = _getDate();
                goCountDown(date);
                break;
            case 'ContFromDate':
                date = _getDate();
                goCountUp(date);
                break;
            case 'CountToWeekday':
                date = _getWeekdayDate();
                goCountDown(date);
                break;
            case 'Timer':
                date = _getTimerDate();
                goCountDown(date);
                break;
            case 'UserTimer':
                date = _getUserTimerDate();
                goCountDown(date);
                break;
            case 'TimerStopGo':
                date = _getUserTimerDate();
                goTimer(date);
                break;
            case 'Counter':
                let number = _getCounterNumber();
                goCounter(number, null);
                break;
        }

    }



    function counterRun() {
        setElements();
        setStyle();
        startCount();
    }
    return counterRun();
}

document.addEventListener('DOMContentLoaded', function () {
    for (let key in window) {
        if (key.indexOf('CounterBox_') >= 0) {
            let val = window[key];
            new counterBox(val.selector, val);
        }
    }
});
