document.getElementById('contatoForm').addEventListener('submit', function () {
    var nome = this.querySelector('input[inputNome=nome]'), nome = nome.value;
    var data = this.querySelector('input[inputData=data]'), data = data.value;
    var texto = 'Olá destinatário, \nMeu nome é '+ nome +' e meu email é '+ email;
    this.querySelector('input[name=Body]').setAttribute('value', texto);
});