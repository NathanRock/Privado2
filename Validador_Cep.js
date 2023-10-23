const cep = document.getElementById('cep')
const logradourovar = document.getElementById('logradouro')
const bairrovar = document.getElementById('bairro')
const numero = document.getElementById('numero')

function sanitizing_cep() {
    cep.value = cep.value.replace(/\D/g, '')
    cep.value = cep.value.replace(/(\d{5})(\d{3})/g, '$1-$2')
}

function remover_letras() {
    numero.value = numero.value.replace(/\D/g, '')
}

cep.addEventListener('focusout', async () => {

    let sanitized_cep = cep.value.replace('-', '')

    try{
        if(sanitized_cep.length === 8){

            const options = {
                method: 'GET'
            }
        
            await fetch(`https://viacep.com.br/ws/${sanitized_cep}/json/`,options)
            .then((response) => {response.json()
                .then((data) => {

                    if (data.erro === undefined && data.erro !== true) {
        
                        const {uf, localidade, logradouro, bairro} = data;
                        logradourovar.value = logradouro;
                        bairrovar.value = bairro;
        
                    }
                })
            })
        
            .catch((error) => {
                console.log(error.message)
            })
            
        }
    }catch(error){
        console.log(error.message)
    }

});
