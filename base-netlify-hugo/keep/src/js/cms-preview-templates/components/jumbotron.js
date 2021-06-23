import React from "react";

export default class Jumbotron extends React.Component {
  render() {
    const {image, title, subtitle} = this.props;
    return <div>
      <div className=" " style={{
        backgroundImage: image && `url(${image})`
      }}>
        <div className=" ">
          <div className=" ">
            <div className=" ">
              <h1 className=" ">
                { title }
              </h1>
            </div>
            <div className=" ">
              {subtitle && <p className=" ">{ subtitle }</p>}
            </div>
          </div>
        </div>
      </div>
    </div>;
  }
}
