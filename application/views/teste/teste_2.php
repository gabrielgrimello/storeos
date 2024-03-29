<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="generator" content="Codeply" />
        <title>Codeply simple HTML/CSS/JS preview</title>
        <base target="_self"> 

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />  


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

        <style>
            .card.draggable {
                margin-bottom: 1rem;
                cursor: grab;
            }

            .droppable {
                background-color: var(--success);
                min-height: 120px;
                margin-bottom: 1rem;
            }
        </style>
    </head>
    <body>
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="container-fluid pt-3">
            <h3 class="font-weight-light text-white">Kanban Board</h3>
            <div class="small  text-light">Drag and drop between swim lanes</div>
            <div class="row flex-row flex-sm-nowrap py-3">
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h6 class="card-title text-uppercase text-truncate py-2">To Do</h6>
                            <div class="items border border-light">
                                <div class="card draggable shadow-sm" id="cd1" draggable="true" ondragstart="drag(event)">
                                    <div class="card-body p-2">
                                        <div class="card-title">
                                            <img src="//placehold.it/30" class="rounded-circle float-right">
                                            <a href="" class="lead font-weight-light">TSK-154</a>
                                        </div>
                                        <p>
                                            This is a description of a item on the board.
                                        </p>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </div>
                                </div>
                                <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                                <div class="card draggable shadow-sm" id="cd2" draggable="true" ondragstart="drag(event)">
                                    <div class="card-body p-2">
                                        <div class="card-title">
                                            <img src="//placehold.it/30" class="rounded-circle float-right">
                                            <a href="" class="lead font-weight-light">TSK-156</a>
                                        </div>
                                        <p>
                                            This is a description of a item on the board.
                                        </p>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </div>
                                </div>
                                <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                                <div class="card draggable shadow-sm" id="cd3" draggable="true" ondragstart="drag(event)">
                                    <div class="card-body p-2">
                                        <div class="card-title">
                                            <img src="//placehold.it/30" class="rounded-circle float-right">
                                            <a href="" class="lead font-weight-light">TSK-157</a>
                                        </div>
                                        <p>
                                            This is an item on the board. There is some descriptive text that explains the item here.
                                        </p>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </div>
                                </div>
                                <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h6 class="card-title text-uppercase text-truncate py-2">In-progess</h6>
                            <div class="items border border-light">
                                <div class="card draggable shadow-sm" id="cd1" draggable="true" ondragstart="drag(event)">
                                    <div class="card-body p-2">
                                        <div class="card-title">
                                            <img src="//placehold.it/30" class="rounded-circle float-right">
                                            <a href="" class="lead font-weight-light">TSK-152</a>
                                        </div>
                                        <p>
                                            This is a task that is being worked on.
                                        </p>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </div>
                                </div>
                                <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                                <div class="card draggable shadow-sm" id="cd2" draggable="true" ondragstart="drag(event)">
                                    <div class="card-body p-2">
                                        <div class="card-title">
                                            <img src="//placehold.it/30" class="rounded-circle float-right">
                                            <a href="" class="lead font-weight-light">TSK-153</a>
                                        </div>
                                        <p>
                                            Another task here that is in progress.
                                        </p>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </div>
                                </div>
                                <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h6 class="card-title text-uppercase text-truncate py-2">Review</h6>
                            <div class="items border border-light">
                                <div class="card draggable shadow-sm" id="cd9" draggable="true" ondragstart="drag(event)">
                                    <div class="card-body p-2">
                                        <div class="card-title">
                                            <img src="//placehold.it/30" class="rounded-circle float-right">
                                            <a href="" class="lead font-weight-light">TSK-158</a>
                                        </div>
                                        <p>
                                            This is a description of a item on the board.
                                        </p>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </div>
                                </div>
                                <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title text-uppercase text-truncate py-2">Complete</h6>
                            <div class="items border border-light">
                                <div class="card draggable shadow-sm" id="cd11" draggable="true" ondragstart="drag(event)">
                                    <div class="card-body p-2">
                                        <div class="card-title">
                                            <img src="//placehold.it/30" class="rounded-circle float-right">
                                            <a href="" class="lead font-weight-light">TSK-144</a>
                                        </div>
                                        <p>
                                            This is a description of an item.
                                        </p>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </div>
                                </div>
                                <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                                <div class="card draggable shadow-sm" id="cd12" draggable="true" ondragstart="drag(event)">
                                    <div class="card-body p-2">
                                        <div class="card-title">
                                            <img src="//placehold.it/30" class="rounded-circle float-right">
                                            <a href="" class="lead font-weight-light">TSK-146</a>
                                        </div>
                                        <p>
                                            This is a description of a task item.
                                        </p>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </div>
                                </div>
                                <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
                                            $(document).ready(function () {
                                    alert("teste");
                                    });
                                            const drag = (event) = > {
                                    event.dataTransfer.setData(" text / plain ", event.target.id);
                                    }

                                    const allowDrop = (ev) = > {
                                    ev.preventDefault();
                                            if (hasClass(ev.target, " dropzone ")) {
                                    addClass(ev.target, " droppable ");
                                    }
                                    }

                                    const clearDrop = (ev) = > {
                                    removeClass(ev.target, " droppable ");
                                    }

                                    const drop = (event) = > {
                                    event.preventDefault();
                                            const data = event.dataTransfer.getData(" text / plain ");
                                            const element = document.querySelector(`#${data}`);
                                            try {
                                            // remove the spacer content from dropzone
                                            event.target.removeChild(event.target.firstChild);
                                                    // add the draggable content
                                                    event.target.appendChild(element);
                                                    // remove the dropzone parent
                                                    unwrap(event.target);
                                            } catch (error) {
                                    console.warn(" can't move the item to the same place")
                                    }
                                    updateDropzones();
                                    }

                                    const updateDropzones = () = > {
                                    /* after dropping, refresh the drop target areas
                                     so there is a dropzone after each item
                                     using jQuery here for simplicity */

                                    var dz = $('<div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &amp;nbsp; </div>');
                                            // delete old dropzones
                                            $('.dropzone').remove();
                                            // insert new dropdzone after each item   
                                            dz.insertAfter('.card.draggable');
                                            // insert new dropzone in any empty swimlanes
                                            $(" .items:not(:has(.card.draggable)) ").append(dz);
                                    };
                                            // helpers
                                                    function hasClass(target, className) {
                                                    return new RegExp('(\\s|^)' + className + '(\\s|$)').test(target.className);
                                                    }

                                            function addClass(ele, cls) {
                                            if (!hasClass(ele, cls)) ele.className += " " + cls;
                                            }

                                            function removeClass(ele, cls) {
                                            if (hasClass(ele, cls)) {
                                            var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');
                                                    ele.className = ele.className.replace(reg, ' ');
                                            }
                                            }

                                            function unwrap(node) {
                                            node.replaceWith(...node.childNodes);
                                            }

        </script>
    </body>

</html>