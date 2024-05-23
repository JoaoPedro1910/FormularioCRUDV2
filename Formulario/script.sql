CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(110) NOT NULL,
    email VARCHAR(110) UNIQUE NOT NULL,
    telefone VARCHAR(20),
    sexo ENUM('Masculino', 'Feminino', 'Outro'),
    tipo_sanguineo VARCHAR(15),
    data_nasc DATE,
    cidade VARCHAR(45),
    estado VARCHAR(45),
    endereco VARCHAR(115)
);
