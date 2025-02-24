-- db: petshop
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO
  `categories` (
    `id`,
    `name`,
    `description`,
    `created_at`,
    `updated_at`
  )
VALUES
  (
    1,
    'Alimentos',
    'Rações e comidas para cães e gatos',
    '2025-02-23 19:48:03',
    '2025-02-23 19:48:42'
  ),
  (
    2,
    'Brinquedos',
    'Brinquedos para pets',
    '2025-02-23 19:48:03',
    '2025-02-23 19:48:45'
  ),
  (
    3,
    'Acessórios',
    'Acessórios para pets',
    '2025-02-23 19:48:03',
    '2025-02-23 19:48:49'
  ),
  (
    4,
    'Cuidados e Higiene',
    'Produtos para higiene de pets',
    '2025-02-23 19:48:03',
    '2025-02-23 19:48:51'
  ),
  (
    5,
    'Saúde',
    'Suplementos e medicamentos para pets',
    '2025-02-23 19:48:03',
    '2025-02-23 19:48:55'
  );

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10, 2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `expiration_date` date DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO
  `products` (
    `id`,
    `name`,
    `description`,
    `price`,
    `quantity`,
    `expiration_date`,
    `category_id`,
    `created_at`,
    `updated_at`
  )
VALUES
  (
    1,
    'Ração Premium para Cães Adultos',
    'Ração balanceada para cães adultos, com proteínas de alta qualidade e vitaminas essenciais para a saúde.',
    150.00,
    50,
    '2025-12-30',
    1,
    '2025-02-23 19:49:03',
    '2025-02-23 19:49:03'
  ),
  (
    2,
    'Varinha com Penas para Gatos',
    'Varinha interativa com penas coloridas, excelente para estimular o gato a brincar.',
    35.00,
    70,
    NULL,
    2,
    '2025-02-23 19:49:03',
    '2025-02-23 19:49:03'
  ),
  (
    3,
    'Coleira de Couro para Cães Pequenos',
    'Coleira ajustável de couro, confortável para cães pequenos.',
    50.00,
    25,
    NULL,
    3,
    '2025-02-23 19:49:03',
    '2025-02-23 19:49:03'
  ),
  (
    4,
    'Xampu Antialérgico para Cães',
    'Xampu hipoalergênico para cães com pelagem sensível.',
    40.00,
    60,
    '2026-06-01',
    4,
    '2025-02-23 19:49:03',
    '2025-02-23 19:49:03'
  ),
  (
    5,
    'Vitaminas para Cães',
    'Suplemento vitamínico para cães com pelo fraco e baixa energia.',
    90.00,
    10,
    '2025-11-20',
    5,
    '2025-02-23 19:49:03',
    '2025-02-23 19:49:03'
  );

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO
  `users` (`id`, `email`, `name`, `password`, `role`)
VALUES
  (
    1,
    'admin',
    'Admin',
    '76d80224611fc919a5d54f0ff9fba446',
    'admin'
  ),
  (
    2,
    'joao',
    'João Victor',
    '962012d09b8170d912f0669f6d7d9d07',
    'user'
  );

ALTER TABLE
  `categories`
ADD
  PRIMARY KEY (`id`);

ALTER TABLE
  `products`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `category_id` (`category_id`);

ALTER TABLE
  `users`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `username` (`email`);

ALTER TABLE
  `categories`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;

ALTER TABLE
  `products`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;

ALTER TABLE
  `users`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;

ALTER TABLE
  `products`
ADD
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);