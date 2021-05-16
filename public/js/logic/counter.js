const getCounter = function (key) {
    let counter = localStorage.getItem(key)
    if (counter){
        counter = JSON.parse(counter)
        const timeout = new Date(counter.timeout)
        if (new Date().getTime() > timeout.getTime()){
            counter = resetCounter()
        }
    }else {
        counter = resetCounter()
    }
    localStorage.setItem(key, JSON.stringify(counter))
    return counter
}

const increaseCounter = function (key) {
    let counter = getCounter(key)
    counter.count++
    localStorage.setItem(key, JSON.stringify(counter))
}

const resetCounter = function (){
    let newTimeout = new Date()
    newTimeout.setHours(0, 0, 0, 0)
    newTimeout.setTime(newTimeout.getTime() + 1000*60*60*24)
    return {
        count: 0,
        timeout: newTimeout.toISOString()
    }
}

const checkCounter = function (key, callback){
    const counter = getCounter(key)
    if ((counter.count - 2) % 3 === 0 && counter.count !== 0){
        callback()
    }
}
