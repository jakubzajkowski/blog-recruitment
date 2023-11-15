export const httpPolling = (func:()=>void,pollTime:number):void=>{
    setInterval(func,pollTime)
}