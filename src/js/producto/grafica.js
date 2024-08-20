import { Chart } from "chart.js/auto";

const canvas = document.getElementById('chartProductos')
const contexto = canvas.getContext('2d')

const chartProductos = new Chart(contexto, {
    type: 'bar',
    data: {
        labels: [],
        datasets: [],
    }
})