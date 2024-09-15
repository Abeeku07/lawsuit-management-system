@extends('layout.master')


<!-- this method works for only "one-liners" -->
@section('title','homepage') 




@section('content')





   <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Judgements</h2>
                        <a href="https://ghalii.org/judgments/"target="_blank" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Court</td>
                                <td>Case Number</td>
                                <td>Status</td>
                                 <!-- <td> Download</td> -->
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Okine and Another vrs Proteus Limited </td>
                                <td>HC</td>
                                <td>CM/0322/2016</td>
                                <td><span class="status delivered"> Delivered</span></td> 
                                 <!-- <td><a href="https://ghalii.org/akn/gh-hr-accra/judgment/ghahc/2024/49/eng@2024-06-07/source"> <ion-icon name="download-outline"></ion-icon></a></td>  --> 
                                
                            </tr>

                            <tr>
                                <td>Boya vrs Mario De Cataldo</td>
                                <td>SC</td>
                                <td>J4/41/2015</td>
                                <td><span class="status delivered">Delivered</span></td>
                                <!-- <td><a href="https://ghalii.org/akn/gh-hr-accra/judgment/ghasc/2024/1/eng@2024-03-13/source"> <ion-icon name="download-outline"></ion-icon></a></td>  -->
                            </tr>

                            <tr>
                                <td>Dr. Amanda Odoi vrs Speaker of Parliament and Another</td>
                                <td>SC</td>
                                <td>J1/13/2023</td>
                                </td>
                                <td><span class="status pending">Pending</span></td>
                                <!-- <td><a href="https://www.myjoyonline.com/supreme-court-to-hear-richard-sky-amanda-odoi-lawsuits-against-anti-lgbtq-bill-today/" target="_blank"> <ion-icon name="link-outline"></ion-icon></a></td>  -->
                            </tr>

                            <tr>
                                <td>Republic vrs Danquah</td>
                                <td>CC</td>
                                <td>46/2022</td>
                                <td><span class="status delivered">Delivered</span></td>
                                <!-- <td><a href="https://ghalii.org/akn/gh/judgment/ghacc/2024/135/eng@2024-05-31/source" target="_blank"> <ion-icon name="link-outline"></ion-icon></a></td>  -->
                            </tr>

                            <tr>
                                <td>Richard Dela Sky vrs Parliament of Ghana and Another</td>
                                <td>SC</td>
                                <td>J1/9/2024</td>
                                <td><span class="status inProgress">In Progress</span></td>
                                <!-- <td><a href="https://www.myjoyonline.com/supreme-court-to-hear-richard-sky-amanda-odoi-lawsuits-against-anti-lgbtq-bill-today/" target="_blank"> <ion-icon name="link-outline"></ion-icon></a></td>  -->
                            </tr>

                            <tr>
                                <td>Fred Robert Coleman vrs Joe Tripollen and 4 Others</td>
                                <td>CA</td>
                                <td>H1/179/2011</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>

                            <tr>
                                <td>Ganyo vrs Krah</td>
                                <td>DC</td>
                                <td>A1/12/21</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>

                            <tr>
                                <td>Kobbina Vrs Oak Tree Medical Services Limited</td>
                                <td>HC</td>
                                <td>E2/14/2023</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>






@endsection 