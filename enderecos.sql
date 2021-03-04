CREATE TABLE `enderecos` (
  `cep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ibge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `enderecos`
  ADD UNIQUE KEY `enderecos_cep_unique` (`cep`);
COMMIT;


INSERT INTO `enderecos` (`cep`, `rua`, `bairro`, `cidade`, `uf`, `ibge`) VALUES
('79081070', 'Rua Pasteur', 'Vila Piratininga', 'Campo Grande', 'MS', '5002704'),
('79100410', 'Rua Valdez', 'Vila Alba', 'Campo Grande', 'MS', '5002704'),
('79110030', 'Rua Ricardo Franco', 'Sobrinho', 'Campo Grande', 'MS', '5002704'),
('79110040', 'Rua Barão de Ladário', 'Sobrinho', 'Campo Grande', 'MS', '5002704'),
('79112010', 'Avenida Presidente Vargas', 'Vila Santo Amaro', 'Campo Grande', 'MS', '5002704');


