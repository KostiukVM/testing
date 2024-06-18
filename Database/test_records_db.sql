# створити тестові жанри
INSERT INTO genres (name) VALUES
                              ('біографічний'),
                              ('автобіографічний'),
                              ('детективний'),
                              ('духовний'),
                              ('історичний'),
                              ('готичний'),
                              ('бульварний'),
                              ('крутійський'),
                              ('пригодницький'),
                              ('психологічний'),
                              ('науково-фантастичний'),
                              ('соціально-побутовий'),
                              ('тенденційний'),
                              ('роман-епопея'),
                              ('роман-щоденник'),
                              ('роман-притча');

# створити тестових відвідувачів
INSERT INTO visitors (name, lastname, email, phone) VALUES
                                                        ('visitor1', 'v1', 'v1@qwe', 111111111),
                                                        ('visitor2', 'v2', 'v2@qwe', 222222222),
                                                        ('visitor3', 'v3', 'v3@qwe', 333333333),
                                                        ('visitor4', 'v4', 'v4@qwe', 444444444),
                                                        ('visitor5', 'v5', 'v5@qwe', 555555555),
                                                        ('visitor6', 'v6', 'v6@qwe', 666666666),
                                                        ('visitor7', 'v7', 'v7@qwe', 777777777),
                                                        ('visitor8', 'v8', 'v8@qwe', 888888888),
                                                        ('visitor9', 'v9', 'v9@qwe', 999999999);

# створити тестові книги
INSERT INTO books (name, author, year, genreId, inStock) VALUES
                                                    ('Book 1', 'Author 1', 2020, 1, true),
                                                    ('Book 2', 'Author 2', 2019, 2, true),
                                                    ('Book 3', 'Author 3', 2018, 3, true),
                                                    ('Book 4', 'Author 4', 2017, 4, true),
                                                    ('Book 5', 'Author 5', 2016, 5, true),
                                                    ('Book 6', 'Author 6', 2015, 1, true),
                                                    ('Book 7', 'Author 7', 2014, 2, true),
                                                    ('Book 8', 'Author 8', 2013, 3, true),
                                                    ('Book 9', 'Author 9', 2012, 4, true),
                                                    ('Book 10', 'Author 10', 2011, 5, true);

