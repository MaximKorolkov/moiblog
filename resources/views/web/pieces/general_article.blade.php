 <!-- Site Top content Start -->
        <section class="top__section" style="background-image: url({{$article->general_image}})">
            <div class="top__cover">
                <div class="top__item">
                    <div class="top_image_item">
                        <a href="{{ action('ArticleController@show' , $article->slug)  }}">
                            <h2>{{$article->title}}</h2>
                            {!! $article->short_description !!}
                        </a>
                    </div>


                </div>
                <div class="help-top-icons" >

                    <div class="help-tems-like-top">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 611.993 611.993" style="enable-background:new 0 0 611.993 611.993;"
                             xml:space="preserve">
						<g>
                            <path d="M562.519,70.476c-30.272-29.953-73.899-49.155-119.797-49.155c-27.022,0-52.412,6.181-76.823,18.557
						C341.48,52.246,321.626,69.17,306,90.657c-15.625-21.487-35.481-38.411-59.898-50.78c-24.418-12.375-49.808-18.557-76.823-18.557
						c-45.898,0-89.518,19.203-119.797,49.155C19.209,100.422,0,144.042,0,189.947c0,31.571,6.708,62.218,14.973,85.289
						c4.104,11.438,10.306,23.834,18.556,36.46c8.348,12.771,15.952,23.438,22.459,31.896c6.514,8.467,15.792,19.049,28.321,31.252
						c12.535,12.215,22.786,21.812,30.272,28.646c7.486,6.842,18.876,16.939,33.856,29.953c17.244,14.98,29.543,26.133,37.439,33.203
						c7.729,6.924,18.883,17.576,33.529,31.578c29.626,28.312,51.363,54.404,71.941,84.309c3.84,5.584,8.792,8.139,14.646,8.139
						c6.188,0,11.542-2.5,15.299-8.139c13.175-19.758,28.404-39.967,46.225-59.898c17.987-20.111,32.96-35.717,44.926-46.877
						c12.126-11.307,29.557-27.084,52.086-47.197c13.931-12.445,25.063-21.812,32.557-28.646c7.486-6.84,17.251-16.279,29.3-28.32
						c12.043-12.049,21.563-22.404,28.321-30.932c6.917-8.723,14.223-19.273,22.459-31.898c16.827-25.786,24.195-46.203,30.272-74.871
						c3.027-14.306,4.556-28.974,4.556-43.946C612,144.042,592.791,100.422,562.519,70.476z M572.936,223.149
						c-6.271,36.12-25.14,71.545-56.642,106.449c-13.75,15.23-38.987,39.475-75.851,72.268c-19.126,17.016-34.501,30.932-46.551,41.996
						c-11.716,10.75-26.126,25.307-43.293,43.619c-17.015,18.146-31.904,36.133-44.6,53.711c-13.348-17.25-28.73-34.752-46.224-52.738
						c-17.661-18.146-31.251-31.898-41.342-41.016c-10.091-9.111-25.466-22.703-46.551-41.342l-22.459-19.855l-20.508-18.557
						c-8.882-8.035-15.716-14.57-20.182-19.529c-4.319-4.805-10.09-11.07-17.25-18.883s-12.667-14.666-16.279-20.182
						c-7.458-11.41-20.14-28.438-24.737-42.647l-7.487-23.112c-5.458-16.848-7.16-34.182-7.16-53.384
						c0-36.46,13.021-67.711,39.064-93.428c26.369-26.042,57.621-39.064,94.4-39.064c25.716,0,49.481,6.833,71.295,20.834
						c21.813,13.993,38.626,32.446,49.481,55.662c3.146,6.736,8.466,10.091,15.952,10.091s13.271-3.125,16.605-10.091
						c10.993-22.994,26.695-41.669,48.502-55.662c21.807-14.001,45.897-20.834,71.614-20.834c36.786,0,68.038,13.021,94.081,38.738
						s39.063,56.968,39.063,93.754C575.866,201.336,574.804,212.392,572.936,223.149z"/>
                        </g>
                            </svg>
                    </div>
                    <div class="help-tems-rewies-top">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 490 490" style="enable-background:new 0 0 490 490;" xml:space="preserve">
							<g>
                                <g>
                                    <path d="M393.872,454.517c-2.304,0-4.583-0.804-6.412-2.354l-99.315-84.194H68.115C30.556,367.968,0,337.242,0,299.474V103.977
							c0-37.768,30.556-68.494,68.115-68.494h353.77c37.559,0,68.115,30.727,68.115,68.494v195.497
							c0,37.768-30.556,68.494-68.115,68.494h-18.071v76.549c0,3.891-2.243,7.428-5.752,9.067
							C396.723,454.21,395.293,454.517,393.872,454.517z M68.115,55.483c-26.592,0-48.226,21.754-48.226,48.494v195.497
							c0,26.739,21.634,48.494,48.226,48.494h223.662c2.346,0,4.616,0.834,6.411,2.354l85.737,72.685v-65.039c0-5.523,4.453-10,9.945-10
							h28.015c26.592,0,48.226-21.755,48.226-48.494V103.977c0-26.74-21.634-48.494-48.226-48.494H68.115z"/>
                                </g>
                                <g>
                                    <g>
                                        <path d="M405.168,147.469H84.832c-5.492,0-9.944-4.478-9.944-10c0-5.523,4.452-10,9.944-10h320.335c5.492,0,9.944,4.477,9.944,10
							C415.111,142.991,410.66,147.469,405.168,147.469z"/>
                                    </g>
                                    <g>
                                        <path d="M405.168,211.503H84.832c-5.492,0-9.944-4.478-9.944-10c0-5.523,4.452-10,9.944-10h320.335c5.492,0,9.944,4.477,9.944,10
							C415.111,207.025,410.66,211.503,405.168,211.503z"/>
                                    </g>
                                    <g>
                                        <path d="M405.168,275.538H84.832c-5.492,0-9.944-4.478-9.944-10c0-5.523,4.452-10,9.944-10h320.335c5.492,0,9.944,4.476,9.944,10
							C415.111,271.06,410.66,275.538,405.168,275.538z"/>
                                    </g>
                                </g>
                                </g>
                            </svg>

                    </div>
                    <a href=""><div class="help-tems-rubric-top">Кино и Сериалы</div></a>

                </div>
            </div>
        </section>
