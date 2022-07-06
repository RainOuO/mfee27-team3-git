<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../template/css/custom-bs.css">
    <link rel="stylesheet" href="../template/css/style.css">
    
</head>

<body>
    <div class="lowest-background w-100 vh-100 d-flex  overflow-hidden">
        <aside id="side-bar" class="side-wrap vh-100 d-flex flex-column">
            <div class="logo-box d-flex justify-content-center align-items-center py-2">
                <a href="" class="fill-w d-block px-4">
                    <img class="img-component dog-body"  src="../images/dashboard/logo_dog-body.svg" class="fill-w" alt="">
                    <img class="img-component dog-tail" src="../images/dashboard/logo_dog-tail.svg" class="fill-w" alt="">
                    <img class="img-component dog-text" src="../images/dashboard/logo_dog-text.svg" class="fill-w" alt="">
                </a>
            </div>
            <nav class="menu-box mt-2 overflow-auto flex-shrink-1 h-100">
                <ul class="list-unstyled accordion" id="menu-accordion">
                    <li class="menu-item"><a href="" class="menu-button icon-home no-accordion">首頁</a></li>
                    <li class="menu-item accordion-header">
                        <button href="" class="menu-button icon-products accordion-button collapsed"
                            data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="true"
                            aria-controls="collapseProducts">商品管理
                            <div class="status-mark"></div>
                        </button>
                        <div id="collapseProducts" class="accordion-collapse collapse"
                            data-bs-parent="#menu-accordion">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="" class="menu-link">商品總覽</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">旅館票券列表</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">餐廳票券列表</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">活動票券列表</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">實體商品列表</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item accordion-header">
                        <button href="" class="menu-button icon-orderlist accordion-button collapsed"
                            data-bs-toggle="collapse" data-bs-target="#collapseOrderList" aria-expanded="true"
                            aria-controls="collapseOrderList">訂單管理
                            <div class="status-mark"></div>
                        </button>
                        <div id="collapseOrderList" class="accordion-collapse collapse"
                            data-bs-parent="#menu-accordion">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="" class="menu-link">訂單總覽</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">旅館票券訂單</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">餐廳票券訂單</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">活動票券訂單</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">實體商品訂單</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item accordion-header">
                        <button href="" class="menu-button icon-message accordion-button collapsed"
                            data-bs-toggle="collapse" data-bs-target="#collapseMessages" aria-expanded="true"
                            aria-controls="collapseMessages">信件匣
                            <div class="status-mark"></div>
                        </button>
                        <div id="collapseMessages" class="accordion-collapse collapse"
                            data-bs-parent="#menu-accordion">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="" class="menu-link">所有信件</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">系統信件列表</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">顧客信件列表</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item accordion-header">
                        <button href="" class="menu-button icon-coupon accordion-button collapsed"
                            data-bs-toggle="collapse" data-bs-target="#collapseCoupon" aria-expanded="true"
                            aria-controls="collapseCoupon">優惠券管理
                            <div class="status-mark"></div>
                        </button>
                        <div id="collapseCoupon" class="accordion-collapse collapse"
                            data-bs-parent="#menu-accordion">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="" class="menu-link">有效優惠券</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">排程中列表</a>
                                    </li>
                                    <li>
                                        <a href="" class="menu-link">已過期列表</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item"><a href="" class="menu-button icon-setting no-accordion">商家設定</a></li>
                </ul>
            </nav>
            <div class="menu-box mt-2 flex-shrink-0 logout">
                <div class="menu-item"><a href="" class="menu-button no-accordion icon-logout">粗企玩</a></div>
            </div>
        </aside>
        <div class="content-wrap vh-100">
            <div class="container-fluid h-100 py-4 overflow-hidden">
                <div class="d-flex flex-column h-100">
                    <div class="content-header d-flex justify-content-end flex-shrink-0">
                        <a href="" class="d-flex justify-content-end align-items-center">
                            <div class="user-name pe-4">汪汪先輩</div>
                            <div class="user-sticker rounded-3 overflow-hidden"><img src="../images/dashboard/pohto_user-sticker.jpg" class="fill-w" alt=""></div>
                        </a>
                    </div>
                    <hr class="flex-shrink-0">
                    <main id="main" class="content-main overflow-auto flex-shrink-1 h-100">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque debitis ea culpa ipsa ut ipsam. Dicta omnis doloremque maxime minus magnam non pariatur aperiam ut hic est reprehenderit obcaecati corrupti, a voluptatum qui dolorem voluptas velit voluptate consectetur similique, nemo libero excepturi? Dolorem, neque? Facere accusamus quae asperiores modi porro debitis. Aperiam odit reiciendis quos, iusto beatae dolor perferendis. Eum totam natus magnam cupiditate dolorum. Iusto, deleniti facilis vitae expedita amet quis hic placeat quisquam optio id odit dolores quibusdam velit magni consequuntur laudantium nisi porro deserunt consequatur molestias exercitationem maxime, soluta incidunt temporibus. Mollitia distinctio ut adipisci optio fuga explicabo voluptates praesentium libero vero necessitatibus, ea dignissimos laudantium asperiores incidunt? Explicabo voluptatem voluptates, omnis quam a pariatur temporibus placeat itaque fugiat delectus voluptatibus nulla commodi quibusdam adipisci, nisi, debitis distinctio ex ad cum cumque impedit eius quas vitae. Aliquam consequatur error blanditiis aliquid, odit aspernatur corrupti recusandae quos incidunt doloremque? Autem, quibusdam distinctio. Quod esse aliquid similique explicabo veniam vero laudantium saepe id! Architecto porro voluptatum veritatis, et aliquam praesentium at, accusantium corrupti aperiam perferendis dolor ullam illo laboriosam ex! Rem corrupti libero id recusandae vitae quibusdam, voluptatum ipsam similique reiciendis nobis neque quisquam amet fuga sunt repellat iste sint saepe exercitationem quia fugit minus odit ea? Nesciunt architecto fugiat saepe quidem natus quo dignissimos et inventore exercitationem vero nulla expedita amet temporibus ad voluptates libero quod quis debitis, eius doloribus! Esse suscipit tempore praesentium quis, est mollitia laudantium. Dignissimos obcaecati eos nemo pariatur officia laborum. Incidunt, ducimus? Quod, dolor beatae commodi doloribus voluptas corporis eveniet voluptatem quo animi quasi perferendis, veniam maiores, eaque harum asperiores praesentium placeat quos tenetur iste. Nemo, repudiandae eius molestias reprehenderit facere, nulla quas autem tempora ea obcaecati voluptatibus, harum minima veniam ipsa excepturi illum aperiam laborum doloribus asperiores voluptates non adipisci? Neque veniam recusandae voluptatem quis officiis sint, et, similique expedita eveniet excepturi cum autem sed quia numquam consequuntur! Veritatis reiciendis beatae quisquam eaque? Possimus libero eligendi, laboriosam odit iure eum corrupti ratione maxime earum nam itaque vel dolorum autem, aut explicabo, reiciendis blanditiis repellendus? Hic sint excepturi nemo porro sapiente aliquid ratione placeat vero eum vel dolorem repellat voluptates animi eaque optio, nesciunt magnam ullam autem beatae accusantium reiciendis minus. Doloribus, quae mollitia! A minima quia ipsa corporis incidunt. Corporis, magnam. Velit voluptatibus sint saepe deserunt minima commodi fugit ducimus, provident minus! Magni quam tenetur odit temporibus veritatis molestiae, iure accusamus laudantium quasi aperiam optio, eius quidem alias, vel quis error vitae saepe enim similique molestias. Ea dolorum quos deleniti ut modi fuga adipisci eligendi necessitatibus temporibus labore neque obcaecati totam esse, tenetur voluptatem, est architecto atque odit non molestiae nobis voluptatibus in? Minima incidunt aut officiis sed itaque ipsa quod maxime distinctio, dolore minus iste molestias soluta reiciendis possimus alias eligendi ullam magnam reprehenderit atque natus harum tenetur quas hic error. Similique aperiam quaerat asperiores fugit, blanditiis, ad nulla quo consectetur aut cumque nam reprehenderit a laboriosam mollitia molestiae voluptate ea quae perferendis ab non enim sapiente magni! Atque adipisci hic ab pariatur autem ea eveniet minus optio, quo necessitatibus. Soluta ducimus quos hic, in pariatur similique quasi magni perspiciatis? Pariatur doloribus amet deleniti est quas porro expedita veritatis fugit non. Vel quos officia quam voluptas quis! Voluptatem maiores quia, eligendi beatae iusto atque doloremque fugit possimus soluta cum totam delectus sunt magnam voluptas tempore voluptatibus? Amet expedita rem ipsam vero magni eveniet quam deleniti non perferendis similique quisquam cumque maxime, ea esse quibusdam nesciunt in? Laborum natus temporibus nostrum minima ab, maiores veniam? Totam, perspiciatis, reprehenderit laboriosam vero odit asperiores enim at consectetur amet sapiente rerum incidunt a cum sunt dignissimos ad fuga? Porro temporibus odit hic vitae, recusandae, ut, sapiente minus quis eos totam similique quos dolorem repudiandae deserunt deleniti eius quidem illo asperiores molestias consectetur veritatis? Porro, inventore fuga iusto itaque iste provident quod illo eum quo aliquid eius eos sapiente voluptatem voluptatibus, temporibus placeat vitae earum voluptas at blanditiis quos natus architecto eveniet deleniti? Nesciunt accusantium cum hic quia ea nihil voluptatem veritatis totam consequuntur perferendis dolores dolorem perspiciatis iure aut nam nostrum ducimus suscipit quod quisquam recusandae libero dolor tempore, asperiores tenetur. Velit quidem aspernatur, veniam aut illo eligendi. Libero commodi quis voluptate deleniti eum dignissimos quod officia quos delectus nam autem totam obcaecati voluptatem reiciendis temporibus ipsam nisi labore nemo rerum excepturi voluptatum, cum sit consequuntur. Itaque, magni obcaecati? Velit porro suscipit voluptate corporis laborum quidem assumenda obcaecati odio. Assumenda mollitia officiis saepe rem facere reiciendis! Voluptatibus explicabo molestiae assumenda nihil. Ducimus voluptatibus accusantium rerum molestias dignissimos ipsum alias deserunt obcaecati, exercitationem suscipit enim ab praesentium nobis minima itaque quam modi voluptas fuga. Nostrum laboriosam reiciendis iste, iusto deleniti ipsa maxime! Soluta suscipit fugiat expedita incidunt non similique saepe aperiam, blanditiis ducimus nesciunt numquam voluptate delectus quasi minus hic voluptas quisquam accusamus culpa eligendi repudiandae voluptates odit eveniet. Eum eaque beatae, explicabo nulla nesciunt harum aliquam optio, officiis odit voluptatum voluptatem alias illum. Architecto quis magnam veritatis eius, exercitationem explicabo incidunt neque unde, laborum vero dignissimos cumque ad distinctio nihil dolores deleniti corrupti eos. Nesciunt dolore deserunt architecto praesentium ab inventore, non reiciendis possimus modi esse ipsa molestias? Praesentium labore explicabo fuga repellat, doloribus neque provident consequuntur blanditiis commodi sequi maiores quod quia odit autem dolor! Asperiores, quam ab deleniti consequuntur, tempora ad, doloribus nam eligendi quas natus magnam. Commodi numquam debitis placeat laboriosam sunt deserunt doloremque nesciunt veniam minima sit voluptate expedita perferendis velit sequi ipsa quo explicabo error, ratione odio? Harum nemo consectetur natus dolor dolores facere aperiam velit, ducimus error excepturi minima reprehenderit rem officia nisi illo dignissimos suscipit labore consequuntur assumenda magnam vero provident voluptatibus quisquam? Modi eum eveniet atque esse impedit? Aut a quam eaque fugit dolorum asperiores obcaecati reprehenderit tempore ratione optio tempora in repudiandae dolor non alias, ipsam enim commodi culpa illo nihil omnis quibusdam! Quibusdam eum iure consectetur earum totam a magni qui recusandae, voluptatum eveniet, amet hic soluta maxime odio! Corporis tempore maxime illum repudiandae cum impedit labore atque eos dolorem laborum, sit accusantium aut nesciunt, sapiente deleniti eaque dicta fuga a mollitia sint error quo. Provident eos doloremque repellendus deserunt dolores placeat esse reiciendis perferendis non iste nemo, dolorum sint ad at molestiae laudantium ipsam voluptatum voluptas ullam aliquid dolorem sed praesentium? Omnis ea atque soluta ducimus dignissimos magnam possimus odio quasi, aspernatur placeat repellat recusandae, necessitatibus eveniet molestiae consectetur asperiores, earum facere tenetur eius quae non itaque voluptas. Possimus, molestias voluptatum modi officia ea quisquam! Delectus soluta tempore modi tempora et sapiente. Quia quidem cumque impedit sapiente ducimus nostrum nam doloremque. Nostrum tempora a, officiis exercitationem facilis, voluptatibus quidem accusantium labore porro eum esse repudiandae. Quis inventore expedita, reiciendis et ipsa libero quo quisquam culpa doloribus quidem tempora atque! Corrupti quasi saepe cum quae, aliquam quidem. Eligendi officia itaque dolorum quibusdam laboriosam illum. Alias eaque similique fuga iure corporis ut minus fugiat quasi, cumque nam, itaque enim perspiciatis suscipit sed, ad eligendi sint quidem id. Fugit est temporibus deserunt, laudantium quisquam animi nulla laborum modi reprehenderit consequatur debitis nostrum ex accusantium voluptates quae, molestias blanditiis, cupiditate impedit eum perspiciatis. Provident odio esse doloribus, quo eos ipsa laboriosam illo dolor, id facilis iure assumenda totam eveniet ad reprehenderit deserunt repellendus voluptatum! Cum, ducimus dolore quos exercitationem dolor similique mollitia corporis at nemo voluptatum iure asperiores temporibus ratione maxime cumque, perferendis illum ut dignissimos amet. Dignissimos impedit quae alias ratione optio nihil minima ullam mollitia pariatur id? Fugit tempora distinctio deserunt hic doloribus rerum reprehenderit itaque illo, explicabo repellendus tempore dignissimos ducimus exercitationem laborum ullam sequi, repellat facere ratione nam voluptatibus architecto modi cumque quibusdam. Est quae numquam reiciendis repellendus! Dignissimos unde similique alias quia quaerat quas impedit atque temporibus. Voluptas rem omnis iusto perferendis culpa explicabo dolore accusantium ipsum voluptatibus alias architecto, quibusdam dicta aspernatur quas sit eaque amet dolorem suscipit consectetur autem, earum soluta nesciunt. At ipsam accusamus quod facere ratione voluptatibus porro repudiandae, ut voluptatum dignissimos consequuntur aspernatur. Autem maiores atque velit quod doloremque aliquid ratione nesciunt recusandae ducimus impedit! Consequatur nulla consectetur quia? Voluptatum asperiores, vitae odio exercitationem deserunt excepturi suscipit eveniet dolorum nulla aliquid qui ipsum corrupti? Sit corrupti voluptates at vero! Ipsum veritatis atque commodi obcaecati debitis adipisci totam? Suscipit dolores esse iste rerum, ullam libero similique necessitatibus minima odio sapiente. Eos, dignissimos dolores sed, modi veniam aspernatur, repellat doloremque ad totam quos magnam delectus culpa autem commodi numquam inventore a ex ut animi corrupti obcaecati mollitia earum quasi. Fuga accusantium ducimus sequi doloremque praesentium illum laboriosam aliquid! Placeat velit, sint assumenda quasi at reiciendis? Ratione esse et quas quae, neque atque? Eaque adipisci harum modi neque nam atque vitae eius at ad eligendi, ut repellendus architecto eveniet, aliquam facere? Harum enim est possimus facere ad sequi iste debitis quia aspernatur accusantium suscipit, iusto soluta fugiat voluptas architecto incidunt dicta hic at dolorem explicabo tenetur. Voluptatem sunt sit rem necessitatibus cumque quisquam, beatae officiis pariatur provident esse est vitae, sapiente ipsum labore amet culpa aliquid libero tempore! Esse perferendis quia, suscipit natus obcaecati nostrum temporibus pariatur officia iusto tempore nulla numquam repellat accusamus laboriosam aliquid deleniti saepe! Facere soluta incidunt, ipsam voluptate cupiditate optio maiores nesciunt ducimus modi veritatis nisi deleniti, voluptatem maxime? Natus iste maxime, alias cumque modi ea, quae quos facilis repellendus, similique vel saepe pariatur cum placeat sunt sed temporibus! Repudiandae consequuntur maxime vel dolores. Temporibus deleniti nihil sequi suscipit ipsa consectetur aliquid sapiente quisquam nulla, voluptates recusandae, eius facere fuga incidunt ea, eos fugit nam. Iure officiis aspernatur reprehenderit nemo voluptas minus pariatur neque fugit? Iste voluptatum consectetur eligendi facilis minus nam dolore veritatis iure at, laborum aliquam blanditiis debitis rem officia! Aliquam sit atque quo explicabo qui unde adipisci eaque ut, repudiandae expedita debitis, pariatur obcaecati inventore ad, fugiat id! Perspiciatis nemo, sapiente tempora exercitationem quidem iusto nostrum tenetur ipsum recusandae eos voluptatibus earum obcaecati a, eius magnam! Suscipit vitae delectus eos, dolore dolor ipsam expedita. Aliquam soluta iure natus accusamus corporis, amet nobis omnis consequatur reiciendis deserunt dolores a at odio mollitia minima assumenda nam blanditiis facilis aut pariatur harum magnam. Facilis, molestias porro qui vel perferendis illo in error dignissimos totam? Porro cumque pariatur voluptatibus obcaecati fugiat quam perferendis, quidem praesentium quas veritatis. Quaerat minus asperiores fugit nisi nemo dignissimos unde? Porro impedit amet perspiciatis repudiandae exercitationem. Labore corrupti quidem eligendi, fuga explicabo error aut neque ab corporis quibusdam rerum, nemo ipsam blanditiis unde doloremque. Dolores, beatae minima aliquam tempora ea obcaecati? Iusto fugit officia modi ut sequi fuga ex pariatur explicabo? Tempora debitis corporis esse quibusdam! Et nostrum beatae in, cum enim ab est, ut necessitatibus repellendus cumque, repudiandae rem hic iusto! Officiis harum maiores quaerat, optio impedit ex deserunt minus tempore ducimus! Quos odio dignissimos vero, officiis accusamus quisquam ipsa aut tempora nihil porro error rem temporibus provident tenetur id. Ducimus, assumenda accusantium reiciendis autem odio error ipsum veritatis, non iure blanditiis repudiandae ab repellat officia illum a voluptates, ea labore est! Numquam dolorum harum quibusdam nisi incidunt aspernatur ullam et natus, assumenda quas facilis corporis repellat ipsam molestias similique ab! Numquam eius blanditiis, tempora tenetur alias nihil animi possimus at ratione explicabo quae error quisquam odit incidunt iure ipsam repellendus, magnam enim sequi vel aliquid eos dolor obcaecati! Voluptas praesentium atque porro aperiam? Modi cumque pariatur qui aspernatur culpa labore temporibus, corrupti deleniti officiis ad sit facere sed ipsum quo cum iste debitis ratione dicta neque similique distinctio possimus ullam? Aliquam cum nostrum optio voluptatibus dignissimos quam unde dolores facere expedita! Nesciunt repudiandae itaque asperiores rem optio adipisci aspernatur qui illo incidunt quas a, expedita quidem sed natus delectus eum ea consequuntur unde. Debitis dicta itaque qui necessitatibus quae, ab ducimus mollitia suscipit unde molestias fugit cum, nostrum, sit tempora ad. Harum quia officia qui dolor. Provident vel sunt adipisci, quam ipsam voluptate alias praesentium culpa tempore voluptas nam dolores. Aspernatur veniam mollitia officiis est sint, vel consequuntur doloremque, quas iste quidem recusandae quos soluta. Molestiae necessitatibus sunt aspernatur accusantium dicta, veniam obcaecati tempore reprehenderit perferendis? Aperiam cumque eos maiores, excepturi culpa, impedit modi officiis tempore alias dolore dolores a!
                    </main>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
</body>

</html>