function PMT(taza, periodo, monto, valorFuturo, tipo) {

    let pmt, montoSi;

    valorFuturo || (valorFuturo = 0);
    tipo || (tipo = 0);

    if (taza === 0)
        return -(monto + valorFuturo)/periodo;

    montoSi = Math.pow(1 + taza, periodo);
    pmt = - taza * (monto * montoSi + valorFuturo) / (montoSi - 1);

    if (tipo === 1)
        pmt /= (1 + taza);

    return pmt;
}

function calcular(){
    let tazaQ,taza,periodo,monto,futuro,tipo,interes,prima,montototal

    futuro = 0
    tipo = 0
    
    interes = document.getElementById('txtInteres').value
    periodo = document.getElementById('txtMeses').value
    prima = document.getElementById('txtPrima').value
    montototal = document.getElementById('txtValorVivienda').value

    taza = ((interes/100)/12)
    tazaQ = ((9/100)/12)
    monto = montototal - prima

    let resultado = PMT(taza,periodo,monto,futuro,tipo)
    let resultadoQ = PMT(tazaQ,periodo,monto,futuro,tipo)

    document.getElementById('txtResultado').value = Math.abs(resultado)
    document.getElementById('txtResultadoQ').value = Math.abs(resultadoQ)
}